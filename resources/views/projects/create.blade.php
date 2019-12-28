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
                        <li class="breadcrumb-item active">Add project</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <form action="{{ route('projects.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-9">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" id="title" name="title" class="form-control form-control-lg" placeholder="Title of the project" required>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="body">
                            <textarea name="body" id="body" rows="6" class="form-control"></textarea>
                        </div>
                        <hr>
                        <label >Goals</label>
                        <div class="clearfix">
                            <table class="table table-bordered" id="goalsTable">
                                <thead>
                                    <tr>
                                        <th style="width: 30px"></th>
                                        <th>Goal</th>
                                        <th style="width: 12px"></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                            <button type="button" id="addGoalBtn" class="btn btn-sm btn-dark float-right">Add new goal</button>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="thumbnail">Featured Image</label>
                            <img id="holder" class="img-fluid rounded my-2">
                            <div class="input-group">
                                <input type="text" name="image" id="thumbnail" class="form-control">
                                <div class="input-group-append">
                                    <button data-input="thumbnail" data-preview="holder" class="lfm btn btn-dark waves-effect waves-light" type="button">Choose an image</button>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-outline-dark">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@include('projects.inc.goal-template')
@endsection

@push('js')
    <script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
    <script src="{{ asset('assets/plugins/handlebars/handlebars.js') }}"></script>
    <script>
        window.idx = 1;
        $(document).ready(function () {
            var template = Handlebars.compile($("#goal-template").html());
            $('.lfm').filemanager('image');

            $(document).on('click', '#addGoalBtn', function () {
                var $goalsTable = $('#goalsTable').find('tbody'),
                    data = {id : window.idx};
                $goalsTable.append(template(data));
                window.idx++;
            });
        });
    </script>
@endpush