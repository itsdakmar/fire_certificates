@extends('layouts.master')
@section('before-css')

@endsection

@section('main-content')
    <div class="row">
        <div class="col-lg-10 mb-3">
            <div class="card">
                <div class="card-header bg-transparent">
                    <h3 class="card-title mt-3">Maklumat Penuh Premis</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table-borderless text-14">
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td class="font-weight-bold px-3">{{ $premiseDetail->name }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td class="font-weight-bold px-3">{{ $premiseDetail->address }}</td>
                            </tr>
                            <tr>
                                <td>Nombor Telefon</td>
                                <td>:</td>
                                <td class="font-weight-bold px-3">{{ $premiseDetail->phone_number }}</td>
                            </tr>
                            <tr>
                                <td>Nombor Fax</td>
                                <td>:</td>
                                <td class="font-weight-bold px-3">{{ $premiseDetail->fax_number }}</td>
                            </tr>
                            <tr>
                                <td>Nama PIC</td>
                                <td>:</td>
                                <td class="font-weight-bold px-3">{{ $premiseDetail->pic_name }}</td>
                            </tr>
                                <td>Nombor Telefon PIC</td>
                                <td>:</td>
                                <td class="font-weight-bold px-3">{{ $premiseDetail->pic_phone }}</td>
                            <tr>
                                <td>Nama FC</td>
                                <td>:</td>
                                <td class="font-weight-bold px-3">{{ $premiseDetail->fc_name }}</td>
                            </tr>
                            <tr>
                                <td>Nombor Telefon FC</td>
                                <td>:</td>
                                <td class="font-weight-bold px-3">{{ $premiseDetail->phone }}</td>
                            </tr>
                            <tr>
                                <td>Jenis Premis</td>
                                <td>:</td>
                                <td class="font-weight-bold px-3">{{ $premiseDetail->premiseType->name }}</td>
                            </tr>
                            <tr>
                                <td>Kategori Premis</td>
                                <td>:</td>
                                <td class="font-weight-bold px-3">{{ $premiseDetail->premiseCategory->name }}</td>
                            </tr>
                            <tr>
                                <td>Balai</td>
                                <td>:</td>
                                <td class="font-weight-bold px-3">{{ $premiseDetail->office->name }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
