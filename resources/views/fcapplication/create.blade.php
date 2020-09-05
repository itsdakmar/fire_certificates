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
                                    <input type="radio" name="type" value="1">
                                    <span>Baharu</span>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio radio-secondary pr-2">
                                    <input type="radio" name="type" value="2">
                                    <span>Pembaharuan</span>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group col-md-8">
                            <label>Tarikh Mohon Perakuan</label>
                            <div class="input-group">
                                <input id="picker3" class="form-control datepicker" data-date-format="dd/mm/yyyy" name="apply_date" >
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="icon-regular i-Calendar-4"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                            <div class="form-group col-md-8">
                                <label class="ul-form__label">Nama Premis:</label>
                                <select name="premise_detail_id" id="selPremise" class="form-control">
                                    <option value="">Pilih Premis</option>
                                </select>
                            </div>

                    </div>
                    <div class="custom-separator"></div>
                    <div class="card-title">Dokumen Sokongan</div>

                    <div class="form-row col-md-12">
                        <div class="form-group col-md-4">
                            <label class="ul-form__label">Borang 2:</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file" name="documents[]">
                                <label class="custom-file-label" aria-describedby="inputGroupFileAddon02" id="file-label">Choose
                                    file</label>
                            </div>
                            <small id="passwordHelpBlock" class="ul-form__text form-text ">
                                Jenis Fail: .pdf
                            </small>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail4" class="ul-form__label">Deskripsi:</label>
                            <input type="text" class="form-control" id="inputtext4" placeholder="Enter full name" name="description">
                            <small id="passwordHelpBlock" class="ul-form__text form-text ">
                                Deskripsi ringkas fail yang dimuat naik.
                            </small>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="ul-form__label">Jenis Dokumen:</label>
                            <select required name="doctype" class="custom-select" >
                                <option selected disabled>--Pilih Jenis Permohonan--</option>
                                <option value="1">Borang FC1</option>
                            </select>
                        </div>
                        <div class="form-group col-md-1">
                            <label class="ul-form__label "> Tambah: </label>
                            <button class="btn btn-outline-primary" type="button">+</button>
                        </div>

                    </div>

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

    </script>


@endsection

