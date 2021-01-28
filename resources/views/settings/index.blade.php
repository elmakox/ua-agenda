@extends('layouts.app')

@section('title', 'Settings - UA Agenda 2063')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Settings</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Settings</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <h5>Add a new lang</h5>
                            <form action="">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <select name="name" id="name" class="form-control">
                                        <option value=""></option>
                                        <option value="english">English</option>
                                        <option value="francais">Français</option>
                                        <option value="portugais">Portugais</option>
                                    </select>
                                    <span class="help-block name-error"></span>
                                </div>
                            </form>
                        </div>
                        <div class="col-7">
                            <table class="table dt-responsive nowrap" id="langs">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Code</th>
                                        <th><i class="feather-star"></i></th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
