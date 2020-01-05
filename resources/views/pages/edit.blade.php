@extends('layouts.app')

@section('title', 'Edit Page - UA Agenda 2063')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Pages <a href="{{ route('pages.index') }}" class="btn btn-outline-dark"><i class="feather-briefcase"></i> All pages</a></h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('pages.index') }}">Pages</a></li>
                        <li class="breadcrumb-item active">Edit page</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <form action="{{ route('pages.update', $page->id) }}" method="post">
        @csrf @method('PUT')
        <div class="row">
            <div class="col-9">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" id="title" name="title" class="form-control form-control-lg" placeholder="Title of the page" value="{{ $page->title }}" required>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="body">
                            <textarea name="body" id="body" rows="6" class="form-control">{{ $page->body }}</textarea>
                        </div>
                        <hr>
                        <label >Additional links</label>
                        <div class="clearfix">
                            <table class="table table-bordered" id="linksTable" data-count="{{ $page->additional_links ? count($page->additional_links) : 0 }}">
                                <thead>
                                    <tr>
                                        <th style="width: 30px"></th>
                                        <th>Title</th>
                                        <th>Url</th>
                                        <th>Link</th>
                                        <th style="width: 12px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($page->additional_links as $link)
                                        <tr>
                                            <td class="slide-count p-1 bg-light text-center" style="width: 30px; vertical-align: middle;">
                                                <span>{{ $loop->index + 1 }}</span>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="link[{{ $loop->index }}][title]" autocomplete="off" placeholder="Title of the link" value="{{ $link['title'] }}">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="link[{{ $loop->index }}][url]" autocomplete="off" placeholder="Url of the link" value="{{ $link['url'] }}">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <select class="form-control" name="link[{{ $loop->index }}][link]" id="link-{{ $loop->index }}">
                                                        <option value="internal" {{ $link['link'] == 'internal' ? 'selected' : '' }}>Internal</option>
                                                        <option value="external" {{ $link['link'] == 'external' ? 'selected' : '' }}>External</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td class="slide-remove p-1 bg-light text-center" style="width: 12px; vertical-align: middle;">
                                                <button type="button" class="btn btn-sm btn-danger removeRow">
                                                    <i class="feather-minus-circle"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <button type="button" id="addLinkBtn" class="btn btn-sm btn-dark float-right">Add new goal</button>
                        </div>
                        <hr>
                        <label>Medias</label>
                        <div class="clearfix">
                            <table class="table table-bordered" id="mediaTable" data-count="{{ $page->media ? count($page->media) : 0 }}">
                                <thead>
                                <tr>
                                    <th style="width: 30px"></th>
                                    <th>Media</th>
                                    <th style="width: 12px"></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($page->media as $media)
                                        <tr>
                                            <td class="slide-count p-1 bg-light text-center" style="width: 30px; vertical-align: middle;">
                                                <span>{{ $loop->index + 1 }}</span>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input type="text" name="media[{{ $loop->index }}]" id="thumbnail-{{ $loop->index }}" class="form-control" placeholder="Media" value="{{ $media }}">
                                                        <div class="input-group-append">
                                                            <button data-input="thumbnail-{{ $loop->index }}" data-preview="holder" class="lfm btn btn-dark waves-effect waves-light" type="button">Choose a media</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="slide-remove p-1 bg-light text-center" style="width: 12px; vertical-align: middle;">
                                                <button type="button" class="btn btn-sm btn-danger removeRow">
                                                    <i class="feather-minus-circle"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <button type="button" id="addMediaBtn" class="btn btn-sm btn-dark float-right">Add new media</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="projects">Projects</label>
                            <select name="projects[]" id="projects" class="form-control selectable" multiple>
                                @foreach($projects as $project)
                                    <option value="{{ $project->id }}" {{ in_array($project->id, $page->projects->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $project->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="aspirations">Aspirations</label>
                            <select name="aspirations[]" id="aspirations" class="form-control selectable" multiple>
                                @foreach($aspirations as $aspiration)
                                    <option value="{{ $aspiration->id }}" {{ in_array($aspiration->id, $page->aspirations->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $aspiration->title }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-outline-dark">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @include('pages.inc.link-template')
    @include('pages.inc.media-template')
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/select2.min.css') }}" type="text/css">
    <style>
        .select2-container--classic .select2-selection--multiple .select2-selection__choice {
            background-color: #2e4050;
        }
    </style>
@endpush

@push('js')
    <script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
    <script src="{{ asset('assets/plugins/handlebars/handlebars.js') }}"></script>
    <script src="{{ asset('assets/plugins/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
    <script>
        window.links = $('#linksTable').data('count') + 1;
        window.medias = $('#mediaTable').data('count') + 1;
        $(document).ready(function () {
            var linkTemplate = Handlebars.compile($("#link-template").html()),
                mediaTemplate = Handlebars.compile($("#media-template").html());
            CKEDITOR.replace( 'body' );
            $('.lfm').filemanager('image');

            $('.selectable').select2({
                placeholder: 'Select an item',
                theme: "classic",
                multiple: true
            });

            $(document).on('click', '#addLinkBtn', function () {
                var $linksTable = $('#linksTable').find('tbody'),
                    data = {id : window.links};
                $linksTable.append(linkTemplate(data));
                window.links++;
            });

            $(document).on('click', '#addMediaBtn', function () {
                var $mediaTable = $('#mediaTable').find('tbody'),
                    data = {id : window.medias};
                $mediaTable.append(mediaTemplate(data));
                $('.lfm').filemanager('file');
                window.medias++;
            });
        });
    </script>
@endpush