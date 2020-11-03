@extends('layouts.master')
@section('page-css')
    <link rel="stylesheet" href={{ asset('/assets/styles/vendor/datatables.min.css') }}>
@endsection
@section('main-content')

    <div class="row justify-content-end">
        <div class="col px-0 mb-4">
            <a href="{{ route('email.notify') }}" class="btn btn-primary">Hantar Notifikasi (E-mel)</a>
        </div>
    </div>

    @if (session('status'))
        <div class="row">
            <div class="col px-0">
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
        <div class="col px-0">
            <div class="card">
                <div class="card-body">
                    <table class="display table table-striped table-bordered" id="application-table">
                        <thead>
                        <tr>
                            <th scope="col">Nama Premis</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Tarikh Tamat FC</th>
                            <th scope="col">Bil. Hari Sebelum Tarikh Tamat</th>
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
                order: [[ 3, "asc" ]],
                ajax: {
                    url: '{{ route('approved.data') }}'
                },
                columns: [
                    {
                        data: 'premise_detail.name',
                        name: 'premise_detail.name',
                    },
                    {
                        data: 'premise_detail.premise_category.name',
                        name: 'premise_detail.premise_category.name',
                    },
                    {
                        data: 'expiry_date',
                        name: 'expiry_date',
                    },
                    {
                        data: 'countdown',
                        name: 'countdown',
                    }
                ],

                dom: 'Bfrtip',
                columnDefs: [
                    {
                        targets: 1,
                        className: 'noVis'
                    }
                ],
                buttons: [
                    {
                        extend: 'colvis',
                        columns: ':not(.noVis)'
                    }
                ],

                createdRow: function ( row, data, index ) {
                    if ( parseInt(data['countdown']) == 0 ) {
                        $(row).css({'background' : '#f8d7da'});
                    }
                    else if ( parseInt(data['countdown']) <= 5 ) {
                        $(row).css({'background' : '#fff3cd'});
                    }

                }
            });




        });
    </script>
@endsection
