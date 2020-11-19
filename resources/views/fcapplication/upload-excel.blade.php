@extends('layouts.master')
@section('main-content')
    @include('components.breadcrumb',[
        $breadcrumbs = [
            'Premis',
            'Maklumat Premis',
            'Muat-Naik Excel (.xlsx)'
        ]
    ])

    <div class="separator-breadcrumb border-top"></div>

    @if ($errors->any())
        <div class="row">
            <div class="col px-0">
                <div class="alert alert-card alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col px-0">
            <div class="card">
                <form method="post" action="{{ route('application.upload') }}" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        <h5 class="font-italic">Dokumen berbentuk Excel yang ingin dimuat naik mestilah mengikut format yang telah ditetapkan.</h5><br>

                        <div class="custom-file">
                            <input type="file" name="fc_application" class="custom-file-input" id="customFile"
                                   accept="application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                            <label class="custom-file-label" for="customFile">Pilih fail</label>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="mc-footer">
                            <div class="row text-center">
                                <div class="col-lg-12 ">
                                    <button type="submit" class="btn btn-primary m-1">Simpan</button>
                                    <a type="button" href="{{ route('dashboard') }}" class="btn btn-outline-secondary m-1">Batal</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="card mt-3">
                <div class="card-body">
                <h5>Format Dokumen</h5>
                    <ul>
                        <li>Kesemua lajur <b>perlu</b> ada.</li>
                        <li>Pastikan <b>kod kategori</b> bagi setiap premis adalah tepat.</li>
                        <li>Klik butang <b>Muat Turun</b> dibawah bagi memuat turun format dokumen Excel.</li>
                    </ul>
                    <a href="{{ url('/download') }}" class="btn btn-outline-primary">Muat Turun</a><br>

                <img class="p-4" style="width: 1000px" src="{{ asset('assets/images/format-excel.png') }}" alt="">
                </div>
            </div>

        </div>
    </div>
    @isset($imports)
        <div class="row mt-4">
            <div class="col px-0">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <td>Kod premis</td>
                                    <td>Nama premis</td>
                                    <td>Alamat premis</td>
                                    <td>Jenis premis</td>
                                    <td>ERT (Ada/Tiada)</td>
                                    <td>Balai</td>
                                    <td>Tarikh Mohon</td>
                                    <td>No. Telefon</td>
                                    <td>No. Fax</td>
                                    <td>PIC</td>
                                    <td>No. Telefon PIC</td>
                                    <td>FC</td>
                                    <td>No. Telefon FC</td>
                                </tr>
                                @foreach($imports[0] as $key => $import)
                                </tr>
                                    @foreach($import as $premise)
                                        <td>{{ $premise }}</td>
                                    @endforeach
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endisset

@endsection

@section('bottom-js')
    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function () {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
@endsection
