@extends('layouts.app')

@section('title', 'Users Management - UA Agenda 2063')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Users <button type="button" id="addUserBtn" class="btn btn-outline-dark"><i class="feather-user-plus"></i> Add new</button></h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table dt-responsive nowrap" id="users">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Date of creation</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('users.inc.addUserModal')
    @include('users.inc.editUserModal')
@endsection

@push('js')
    <script>
        $(document).ready(function () {
            $('#users').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('users.datatable') !!}',
                columns: [
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email'},
                    { data: 'created_at', name: 'created_at'},
                    { data: 'actions', name: 'actions', sortable: false, searchable: false},
                ],
            });

            $(document).on('click', '#addUserBtn', function () {
                $('#addUserModal').modal({
                    show: true,
                    backdrop: 'static',
                    keyboard: false
                });
            });

            $(document).on('submit', '#addUserForm', function (e) {
                e.preventDefault();
                var $form = $(this),
                    $btn = $form.find('button[type="submit"]');

                $.ajax({
                    type: 'POST',
                    url: $form.attr('action'),
                    data: $form.serialize(),
                    beforeSend: function(){
                        $btn.button('loading');
                    },
                    success: function(data){
                        console.log(data);
                        $('#users').DataTable().ajax.reload();
                        $('#addUserModal').modal('hide');
                        clearForm($form);
                        //Toast
                        $btn.button('reset');
                    },
                    error: function(err){
                        if (err.status === 422) {
                            $.each(err.responseJSON.errors, function (key, value) {
                                $form.find('.'+key+'-error').closest('.form-group').find('.form-control').addClass('is-invalid');
                                $form.find('.'+key+'-error').html(value);
                                $form.find('.'+key+'-error').show();
                            });

                        } else {
                            // toastr.error('Une erreur est survenue. Veuillez réessayer ou contacter un administrateur');
                            console.log(err.responseText);
                        }
                        $btn.button('reset');
                    }
                })
            });

            $(document).on('click', '.editUserBtn', function () {
                var $btn = $(this),
                    url = $btn.data('route'),
                    $modal = $('#editUserModal'),
                    $form = $('#editUserForm');
                $.ajax({
                    type: 'GET',
                    url: url,
                    beforeSend: function () {
                        $btn.button('loading');
                    },
                    success: function (res) {
                        console.log(res);
                        clearForm($form);
                        $form.attr('action', url);
                        $form.find('input[name="name"]').val(res.name);
                        $form.find('input[name="email"]').val(res.email);
                        $form.find('input[name="password"]').val('');
                        $modal.modal({
                            show: true,
                            backdrop: 'static',
                            keyboard: false
                        });
                        $btn.button('reset');
                    },
                    error: function (err) {
                        console.log(err);
                        $btn.button('reset');
                    }
                })
            });

            $(document).on('submit', '#editUserForm', function (e) {
               e.preventDefault();
                var $form = $(this),
                    $btn = $form.find('button[type="submit"]');

                $.ajax({
                    type: 'PUT',
                    url: $form.attr('action'),
                    data: $form.serialize(),
                    beforeSend: function(){
                        $btn.button('loading');
                    },
                    success: function(data){
                        console.log(data);
                        $('#users').DataTable().ajax.reload();
                        $('#editUserModal').modal('hide');
                        clearForm($form);
                        //Toast
                        $btn.button('reset');
                    },
                    error: function(err){
                        if (err.status === 422) {
                            $.each(err.responseJSON.errors, function (key, value) {
                                $form.find('.'+key+'-error').closest('.form-group').find('.form-control').addClass('is-invalid');
                                $form.find('.'+key+'-error').html(value);
                                $form.find('.'+key+'-error').show();
                            });

                        } else {
                            // toastr.error('Une erreur est survenue. Veuillez réessayer ou contacter un administrateur');
                            console.log(err.responseText);
                        }
                        $btn.button('reset');
                    }
                })
            });

            $(document).on('click', '.deleteUserBtn', function () {
                if (confirm('Êtes vous sûr de vouloir supprimer ?')){
                    var $btn = $(this),
                        url = $btn.data('route');
                    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
                    $.ajax({
                        type: "DELETE",
                        url: url,
                        beforeSend: function () {
                            $btn.button('loading');
                        },
                        success: function() {
                            $('#users').DataTable().ajax.reload();
                            // toastr.success('Utilisateur supprimé avec succès');
                            $btn.button('reset');
                        },
                        error: function(data) {
                            // toastr.error('Une erreur est survenue!! Veuillez rééessayer ou contacter un administrateur.');
                            console.log('Error:', data.responseText);
                            $btn.button('reset');
                        }
                    });
                }
            });
        })
    </script>
@endpush