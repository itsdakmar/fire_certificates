@extends('layouts.master')
@section('before-css')
    <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.css')}}">
    <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.date.css')}}">
@endsection
@section('main-content')

    <div class="row">
    <div class="col-lg-10 mb-3">
        <div class="card">
            <div class="card-header bg-transparent">
                <h3 class="card-title mt-3">Semakan Kelulusan Bagi Permohonan Perakuan</h3>
            </div>
            <!--begin::form-->
            <form action="{{ route('application.approved', $fc_application->id) }}" method="POST" >
                @csrf
                <div class="card-body">
                    <div class="form-row ">
                        <div class="form-group col-md-8">
                            <label class="ul-form__label">Nama Premis:</label>
                            <input type="text" class="form-control" value="{{ $fc_application->premiseDetail->name }}" readonly>
                        </div>

                        <div class="form-group col-md-8">
                            <label>Tarikh Lulus Permohonan</label>
                            <div class="input-group">
                                <input id="picker-approved" class="form-control" placeholder="Sila Pilih Tarikh lulus permohonan" name="approved_date" >
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="icon-regular i-Calendar-4"></i>
                                    </div>
                                </div>
                            </div>
                            @error('approved_date__submit')
                            <div class="ul-form__text form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="mc-footer">
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <button type="submit"  onclick="return confirm('Adakah anda pasti?')" class="btn  btn-primary m-1">Hantar</button>
                                <button type="button" class="btn btn-outline-secondary m-1">Batal</button>
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

    <script src="{{asset('assets/js/vendor/pickadate/picker.js')}}"></script>
    <script src="{{asset('assets/js/vendor/pickadate/picker.date.js')}}"></script>

    <script>
        $(document).ready(function(){
            $('#picker-approved').pickadate({
                formatSubmit: 'yyyy-mm-dd',
                hiddenSuffix: '__submit'
            });
        });
    </script>


@endsection

