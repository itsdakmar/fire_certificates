@extends('layouts.master')
@section('main-content')
    @include('components.breadcrumb',[
        $breadcrumbs = [
            'Maklumat Premis',
            'Muat-Naik Excel (.xlsx)'
        ]
    ])

    <div class="separator-breadcrumb border-top"></div>

    <div class="row">
        <div class="col px-0">
            <div class="card">
                <form method="post" action="{{ route('premise.upload') }}" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        <div class="text-16 mb-2">Muat Naik Maklumat Premis</div>

                        <div class="custom-file">
                            <input type="file" name="premise" class="custom-file-input" id="customFile"
                                   accept="application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                            <label class="custom-file-label" for="customFile">Pilih fail</label>
                        </div><br/>
                        <small class="font-italic text-danger">*Dokumen berbentuk Excel yang ingin dimuat naik mestilah mengikut format yang telah ditetapkan.</small>
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
                    <ol>
                        <li>Kesemua lajur bertanda <small class="text-danger">*</small> <b>perlu</b> ada.</li>
                        <li>Pastikan <b>kod kategori</b> bagi setiap premis adalah tepat.</li>
                        <li>Sila rujuk halaman <a href="{{ route('references') }}" class="font-weight-bold"><u>Rujukan</u></a> bagi senarai keseluruhan maklumat premis yang diperlukan.</li>
                        <li>Klik butang <b>Muat Turun</b> dibawah bagi memuat turun format dokumen Excel.</li>
                    </ol>
                    <a href="{{ url('/download/format-premise') }}" class="btn btn-outline-primary">Muat Turun</a><br>

                <img class="p-4" style="width: 100%" src="{{ asset('assets/images/format-premise-detail.png') }}" alt=""><br/>

                </div>

            </div>

        </div>
    </div>

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
