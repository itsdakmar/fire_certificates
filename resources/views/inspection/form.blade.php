<div class="card-body">
    <div class="form-group col-md-8">
        <label class="ul-form__label">Nama Premis:</label>
        <input type="text" class="form-control" value="{{ $fc_application->premiseDetail->name }}" readonly>
    </div>
    <div class="form-group col-md-8">
        <label>Tarikh Pemeriksaan</label>
        <div class="input-group">
            <input id="picker3" class="form-control datepicker" data-date-format="dd/mm/yyyy" name="apply_date" >
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="icon-regular i-Calendar-4"></i>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="card-footer">
    <div class="mc-footer">
        <div class="row">
            <div class="col-lg-12 text-right">
                <button type="submit" class="btn  btn-primary m-1">Submit</button>
                <button type="reset" class="btn btn-outline-secondary m-1">Reset</button>
            </div>
        </div>
    </div>
</div>

@section('page-js')
    <script src="{{asset('assets/js/es5/dashboard.v1.script.js')}}"></script>
    <script src="{{asset('assets/js/vendor/pickadate/picker.js')}}"></script>
    <script src="{{asset('assets/js/vendor/pickadate/picker.date.js')}}"></script>

@endsection
