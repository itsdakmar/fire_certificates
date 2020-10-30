@extends('layouts.master')
@section('before-css')
    <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.css')}}">
    <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.date.css')}}">
    <link rel="stylesheet" href="{{asset('assets/styles/vendor/select2/select2.min.css')}}">


@endsection
@section('main-content')

    <div class="row">
    <div class="col-lg-10 mb-3">
        <div class="card">
            <div class="card-header bg-transparent">
                <h3 class="card-title mt-3">Pembukaan Fail Baharu Bagi Permohonan Perakuan</h3>
            </div>
            <!--begin::form-->
            <form action="{{ route('application.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-row ">
                        <div class="form-group col-md-8">
                            <label class="ul-form__label">Jenis Permohonan Perakuan</label><br>
                            <div class="form-check form-check-inline mb-3">
                                <label class="radio ul-form__radio-inline pr-2">
                                    <input type="radio" class="form-check-input @error('type') is-invalid @enderror" name="type" value="1">
                                    <span>Baharu</span>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio radio-secondary pr-2">
                                    <input type="radio" class="form-check-input @error('type') is-invalid @enderror" name="type" value="2">
                                    <span>Pembaharuan</span>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            @error('type')
                            <div class="ul-form__text form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group col-md-8">
                            <label>Tarikh Mohon Perakuan</label>
                            <div class="input-group">
                                <input id="picker3" class="form-control datepicker  @error('apply_date') is-invalid @enderror" data-date-format="dd/mm/yyyy" name="apply_date" >
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="icon-regular i-Calendar-4"></i>
                                    </div>
                                </div>
                            </div>
                            @error('apply_date')
                            <div class="ul-form__text form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                            <div class="form-group col-md-8">
                                <label class="ul-form__label">Nama Premis:</label>
                                <select name="premise_detail_id" id="selPremise" class="form-control @error('premise_detail_id') is-invalid @enderror">
                                    <option value="">Pilih Premis</option>
                                </select>
                                @error('premise_detail_id')
                                <div class="ul-form__text form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                    </div>
                    <div class="custom-separator"></div>
                    <div class="card-title">Dokumen Sokongan</div>

                    <table class="table table-borderless" id="myTable">
                        <tr>
                            <td><label class="ul-form__label">Borang 2:</label></td>
                            <td><label for="inputEmail4" class="ul-form__label">Deskripsi:</label></td>
                            <td><label class="ul-form__label">Jenis Dokumen:</label></td>
                            <td><label class="ul-form__label "> Tambah: </label></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="file" name="documents[]">
                                    <label class="custom-file-label" aria-describedby="inputGroupFileAddon02" id="file-label">Pilih
                                        fail</label>
                                </div>
                                <small id="passwordHelpBlock" class="ul-form__text form-text ">
                                    Jenis Fail: .pdf
                                </small>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="inputtext4" name="description">
                                <small id="passwordHelpBlock" class="ul-form__text form-text ">
                                    Deskripsi ringkas fail yang dimuat naik.
                                </small>
                            </td>
                            <td>
                                <select name="doctype" class="custom-select" >
                                    <option selected disabled>--Pilih Jenis Permohonan--</option>
                                    <option value="1">Borang FC1</option>
                                </select>
                            </td>
                            <td>
                                <button class="btn btn-outline-primary" type="button" id="addBtn">+</button>
                            </td>
                        </tr>
                    </table>


                </div>
                <div class="card-footer">
                    <div class="mc-footer">
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <button type="submit" class="btn  btn-primary m-1">Hantar</button>
                                <a href="{{ route('application.index') }}" type="button" class="btn btn-outline-secondary m-1">Batal</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-- end::form -->
        </div>
    </div>
</div>

@endsection

@section('page-js')
    <script src="{{asset('assets/js/es5/dashboard.v1.script.js')}}"></script>
    <script src="{{asset('assets/js/vendor/pickadate/picker.js')}}"></script>
    <script src="{{asset('assets/js/vendor/pickadate/picker.date.js')}}"></script>
    <script src="{{asset('assets/js/vendor/select2/select2.min.js')}}"></script>

    <script>
        $(document).ready(function(){
            $('#picker2, #picker3').pickadate({
                format: 'dd/mm/yyyy'
            });
        });

        $(document).ready(function () {
            $('#file').on('change', function (e) {
                var file = $(this)[0].files[0].name;
                $('#file-label').text(file);
            });
        });

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function(){

            $( "#selPremise" ).select2({
                ajax: {
                    url: "{{route('premise.getPremise')}}",
                    type: "post",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term // search term
                        };
                    },
                    processResults: function (response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                }

            });

        });


        $('#addBtn').on('click', function () {
            $('#myTable tr:last').after('<tr>\n' +
                '                            <td>\n' +
                '                                <div class="custom-file">\n' +
                '                                    <input type="file" class="custom-file-input" id="file" name="documents[]">\n' +
                '                                    <label class="custom-file-label" aria-describedby="inputGroupFileAddon02" id="file-label">Pilih\n' +
                '                                        fail</label>\n' +
                '                                </div>\n' +
                '                                <small id="passwordHelpBlock" class="ul-form__text form-text ">\n' +
                '                                    Jenis Fail: .pdf\n' +
                '                                </small>\n' +
                '                            </td>\n' +
                '                            <td>\n' +
                '                                <input type="text" class="form-control" id="inputtext4" name="description">\n' +
                '                                <small id="passwordHelpBlock" class="ul-form__text form-text ">\n' +
                '                                    Deskripsi ringkas fail yang dimuat naik.\n' +
                '                                </small>\n' +
                '                            </td>\n' +
                '                            <td>\n' +
                '                                <select name="doctype" class="custom-select" >\n' +
                '                                    <option selected disabled>--Pilih Jenis Permohonan--</option>\n' +
                '                                    <option value="1">Borang FC1</option>\n' +
                '                                </select>\n' +
                '                            </td>\n' +
                '                        </tr>');

        });

    </script>


@endsection

