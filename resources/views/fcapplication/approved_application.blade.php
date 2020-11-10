@extends('layouts.master')
@section('page-css')
    <link rel="stylesheet" href={{ asset('/assets/styles/vendor/datatables.min.css') }}>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />

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
                    <h3>Senarai Premis Telah Lulus Permohonan FC</h3><br/>

                    <div class="row input-daterange">
                        <div class="col-md-4">
                            <input type="text" name="from_date" id="from_date" class="form-control" placeholder="Dari Tarikh" readonly />
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="to_date" id="to_date" class="form-control" placeholder="Sehingga Tarikh" readonly />
                        </div>
                        <div class="col-md-4">
                            <button type="button" name="filter" id="filter" class="btn btn-primary">Cari</button>
                            <button type="button" name="refresh" id="refresh" class="btn btn-default">Refresh</button>
                        </div>

                        <div class="ml-8">
                            <small class="ul-form__text form-text font-italic ">
                                Pilihan tarikh adalah berdasarkan tarikh tamat tempoh.
                            </small>
                        </div>

                    </div><br/>

                    <table class="display table table-striped table-bordered" id="report_table">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>

    <script>
        $(document).ready(function(){
            $('.input-daterange').datepicker({
                todayBtn:'linked',
                format:'yyyy-mm-dd',
                autoclose:true
            });

            load_data();

            function load_data(from_date = '', to_date = '')
            {
                $('#report_table').DataTable({
                    processing: true,
                    serverSide: true,
                    order: [[ 3, "asc" ]],
                    ajax: {
                        url:'{{ route("approved.data") }}',
                        data:{from_date:from_date, to_date:to_date}
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

                    createdRow: function ( row, data, index ) {
                        if ( parseInt(data['countdown']) == 0 ) {
                            $(row).css({'background' : '#f8d7da'});
                        }
                        else if ( parseInt(data['countdown']) <= 5 ) {
                            $(row).css({'background' : '#fff3cd'});
                        }

                    }
                });
            }

            $('#filter').click(function(){
                var from_date = $('#from_date').val();
                var to_date = $('#to_date').val();
                if(from_date != '' &&  to_date != '')
                {
                    $('#report_table').DataTable().destroy();
                    load_data(from_date, to_date);
                }
                else
                {
                    alert('Both Date is required');
                }
            });

            $('#refresh').click(function(){
                $('#from_date').val('');
                $('#to_date').val('');
                $('#report_table').DataTable().destroy();
                load_data();
            });

        });
    </script>
@endsection
