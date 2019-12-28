@extends('layouts.app')

@section('title', 'Aspiration Management - UA Agenda 2063')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Aspirations <a href="{{ route('aspirations.create') }}" class="btn btn-outline-dark"><i class="feather-briefcase"></i> Add new</a></h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Aspirations</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table dt-responsive nowrap" id="aspirations">
                        <thead>
                            <tr>
                                <th style="width: 60px;"></th>
                                <th>Title</th>
                                <th>Goals</th>
                                <th>Date of creation</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function () {
            $('#aspirations').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('aspirations.datatable') !!}',
                columns: [
                    {data: 'image', name: 'image', sortable: false, searchable: false},
                    {data: 'title', name: 'title'},
                    {data: 'goals', name: 'goals'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'actions', name: 'actions', sortable: false, searchable: false},
                ],
                order: [[ 1, "asc" ]],
            });

            $(document).on('click', '.deleteAspirationBtn', function () {
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
                            $('#aspirations').DataTable().ajax.reload();
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