@extends('layouts.master')
@section('page-css')
    <link rel="stylesheet" href={{ asset('/assets/styles/vendor/datatables.min.css') }}>
@endsection
@section('main-content')

    @if (session('status'))
        <div class="row">
            <div class="col">
                <div class="alert alert-card alert-success" role="alert">
                    <strong class="text-capitalize">Success!</strong> {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <table class="display table table-striped table-bordered" id="application-table">
                        <thead>
                        <tr>
                            <th scope="col">Nama Premis</th>
                            <th scope="col">Tarikh Permohonan</th>
                            <th scope="col">Status</th>
                            <th scope="col">Jenis</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-js')
    <script src={{ asset('assets/js/vendor/datatables.min.js') }}></script>
    <script>
        $(document).ready(function () {
            $('#application-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('application.data') }}'
                },
                columns: [
                    {
                        data: 'premise_detail.name',
                        name: 'Nama Premis',
                    },
                    {
                        data: 'apply_date',
                        name: 'Tarikh Permohonan',
                    },
                    {
                        data: 'status',
                        name: 'status',
                    },
                    {
                        data: 'type',
                        name: 'Jenis',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    }
                ]
            });
        });
    </script>
@endsection
