@extends('layouts.master')
@section('page-css')
    <link rel="stylesheet" href={{ asset('/assets/styles/vendor/datatables.min.css') }}>
@endsection
@section('main-content')
    @include('components.breadcrumb',[
        $breadcrumbs = [
            'Premis',
            'Senarai Maklumat Premis'
        ]
    ])
    <div class="separator-breadcrumb border-top"></div>

    <div class="row">
        <div class="col mb-4">

            <a href="{{ route('premise.create') }}" class="btn btn-primary">Daftar Premis Baharu</a>

        </div>
    </div>
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
                    <div class="table-responsive">
                    <table class="display table table-striped table-bordered premise-table" id="premise-table">
                        <thead>
                        <tr>
                            <th scope="col" data-orderable="false"> </th>
                            <th scope="col">No. Rujukan</th>
                            <th scope="col">Nama Premis</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">No. Telefon</th>
                            <th scope="col">Jenis Premis</th>
                            <th scope="col">Kategori Premis</th>
                            <th scope="col">ERT</th>
                            <th scope="col">Balai</th>
                            <th scope="col" data-orderable="false"> </th>
                            <th scope="col">Create </th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-js')
    <script src={{ asset('assets/js/vendor/datatables.min.js') }}></script>
    <script>
        $(document).ready(function () {
            let table = $('#premise-table').DataTable({
                processing: true,
                serverSide: true,
                order: [[ 7, "desc"]],
                ajax: {
                    url: '{{ route('premise.data') }}'
                },
                columns: [
                    {
                      data: 'DT_RowIndex',
                      name: 'DT_RowIndex',
                    },
                    {
                        data: 'no_fail',
                        name: 'no_fail',
                    },
                    {
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'address',
                        name: 'address',
                    },
                    {
                        data: 'phone_number',
                        name: 'phone_number',
                    },
                    {
                        data: 'premise_type.name',
                        name: 'premise_type.name',
                    },
                    {
                        data: 'premise_category.name',
                        name: 'premise_category.name',
                    },
                    {
                        data: 'ert',
                        name: 'ert',
                    },
                    {
                        data: 'office.name',
                        name: 'office.name',
                    },
                    {
                        data: 'action',
                        name: 'action',
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        visible: false
                    }
                ]
            });

            $('#premise-table').on( 'click', 'tr', function () {

            });
        });
    </script>
@endsection
