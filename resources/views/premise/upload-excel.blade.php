@extends('layouts.master')
@section('main-content')
    <div class="breadcrumb">
        <h1>Sistem Pengurusan Perakuan BOMBA</h1>
        <ul>
            <li>JBPM Negeri Melaka</li>
        </ul>
    </div>

    <div class="separator-breadcrumb border-top"></div>

    <div class="row">
        <div class="col">
            <div class="card">
                <form method="post" action="{{ route('premise.upload') }}" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        <div class="custom-file">
                            <input type="file" name="premise" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="mc-footer">
                            <div class="row text-center">
                                <div class="col-lg-12 ">
                                    <button type="submit" class="btn btn-primary m-1">Simpan</button>
                                    <a  href="{{ route('premise.index') }}" type="button" class="btn btn-outline-secondary m-1">Batal</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('page-js')
    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function () {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
@endsection
