@extends('layouts.app')

@section('title', 'Create Project - UA Agenda 2063')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Projects <a href="{{ route('projects.index') }}" class="btn btn-outline-dark"><i class="feather-briefcase"></i> All projects</a></h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Projects</a></li>
                        <li class="breadcrumb-item active">Edit project</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <form action="{{ route('projects.update', $project->id) }}" method="post">
        @csrf @method('PUT')
        <div class="row">
            <div class="col-9">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" id="title" name="title" class="form-control form-control-lg" placeholder="Title of the project" value="{{ $project->title }}" required>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="body">
                            <textarea name="body" id="body" rows="6" class="form-control">{{ $project->body }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="thumbnail">Featured Image</label>
                            <img id="holder" class="img-fluid rounded my-2 w-100" src="{{ $project->image ? $project->image_url() : '' }}">
                            <div class="input-group">
                                <input type="text" value="{{ $project->image }}" name="image" id="thumbnail" class="form-control">
                                <div class="input-group-append">
                                    <button data-input="thumbnail" data-preview="holder" class="lfm btn btn-light waves-effect waves-light" type="button">Choose an image</button>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-dark">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('js')
    <script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
    <script src="{{ asset('assets/plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
        $(document).ready(function () {
            CKEDITOR.replace( 'body' );
            $('.lfm').filemanager('image');

        });
    </script>
@endpush
