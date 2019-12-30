@extends('layouts.app')

@section('title', 'Create News - UA Agenda 2063')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">News <a href="{{ route('news.index') }}" class="btn btn-outline-dark"><i class="feather-briefcase"></i> All news</a></h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('news.index') }}">News</a></li>
                        <li class="breadcrumb-item active">Add project</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <form action="{{ route('news.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-9">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" id="title" name="title" class="form-control form-control-lg @error('title') is-invalid @enderror" placeholder="Title of the news" value="{{ old('title') }}" required>
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea name="body" id="body" rows="6" class="form-control @error('body') is-invalid @enderror">{{ old('body') }}</textarea>
                            @error('body')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <hr>
                        <label>Medias</label>
                        <div class="clearfix">
                            <table class="table table-bordered" id="mediaTable">
                                <thead>
                                <tr>
                                    <th style="width: 30px"></th>
                                    <th>Media</th>
                                    <th style="width: 12px"></th>
                                </tr>
                                </thead>
                                <tbody></tbody>
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
                            <label for="news_date">Date</label>
                            <input type="text" id="news_date" class="form-control @error('news_date') is-invalid @enderror" name="news_date" value="{{ old('news_date') }}">
                            @error('news_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="projects">Projects</label>
                            <select name="projects[]" id="projects" class="form-control selectable" multiple>
                                @foreach($projects as $project)
                                    <option value="{{ $project->id }}" {{ in_array($project->id, old('projects') ? old('projects') : []) ? 'selected' : '' }}>{{ $project->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="aspirations">Aspirations</label>
                            <select name="aspirations[]" id="aspirations" class="form-control selectable" multiple>
                                @foreach($aspirations as $aspiration)
                                    <option value="{{ $aspiration->id }}" {{ in_array($aspiration->id, old('aspirations') ? old('aspirations') : []) ? 'selected' : '' }}>{{ $aspiration->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="is_resource" name="is_resource" {{ old('is_resource') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="is_resource">Is resource</label>
                        </div>

                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-outline-dark">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @include('news.inc.media-template')
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/select2.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
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
    <script src="{{ asset('assets/plugins/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script>
        window.medias = 1;
        $(document).ready(function () {
            var mediaTemplate = Handlebars.compile($("#media-template").html());
            CKEDITOR.replace( 'body' );
            $('.lfm').filemanager('file');
            $('#news_date').datepicker({
                autoclose: true,
                orientation: 'bottom',
                format: 'yyyy-mm-dd'
            });

            $('.selectable').select2({
                placeholder: 'Select an item',
                theme: "classic",
                multiple: true
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