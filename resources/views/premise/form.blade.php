<div class="card-body">

            <div class="form-group col-md-8">
                <label class="ul-form__label">Nama:</label><br>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Nama premis" >
                @error('name')
                <div class="ul-form__text form-text text-danger">{{ $message }}</div>
                @enderror
                <small id="passwordHelpBlock" class="ul-form__text form-text ">
                    Sila masukkan nama penuh premis
                </small>
            </div>

            <div class="form-group col-md-8">
                <label class="ul-form__label">Alamat:</label><br>
                <div class="input-right-icon">
                    <textarea type="text" class="form-control @error('address') is-invalid @enderror" name="address" rows="4" placeholder="Masukkan alamat penuh premis">{{ old('address') }}</textarea>
                    <span class="span-right-input-icon">
                                                        <i class="ul-form__icon i-Map-Marker"></i>
                    </span>
                </div>
                @error('address')
                <div class="ul-form__text form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group col-md-8">
                <label class="ul-form__label">Kategori Premis:</label>
                <select name="premise_category_id" class="custom-select @error('premise_category_id') is-invalid @enderror" >
                    <option selected disabled value="{{ old('premise_category_id') }}">{{ old('premise_category_id') }}</option>
                    @foreach($premisecategories as $premisecategory)
                        <option value="{{ $premisecategory->id }}">{{ $premisecategory->name }}</option>
                    @endforeach
                </select>
                @error('premise_category_id')
                <div class="ul-form__text form-text text-danger">{{ $message }}</div>
                @enderror
            </div><br>

            <div class="form-group col-md-8">
                <label>Jenis Premis:</label><br>
                <div class="form-check form-check-inline mb-3">
                    @foreach($premisetypes as $premisetype)
                    <label class="radio ul-form__radio-inline pr-2">
                        <input class="@error('premise_type_id') is-invalid @enderror" type="radio" name="premise_type_id" value="{{ $premisetype->id }}">
                        <span>{{ $premisetype->name }}</span>
                        <span class="checkmark"></span>
                    </label>
                    @endforeach
                </div>
                @error('premise_type_id')
                <div class="ul-form__text form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-row col-md-8">
                <div class="form-group col-md-4">
                    <label class="ul-form__label">Nombor Telefon:</label>
                    <input type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" placeholder="No. telefon">
                    @error('phone_number')
                    <div class="ul-form__text form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-4">
                    <label class="ul-form__label">Nombor Fax:</label>
                    <input type="text" class="form-control @error('fax_number') is-invalid @enderror" name="fax_number" value="{{ old('fax_number') }}" placeholder="No. fax">
                    @error('fax_number')
                    <div class="ul-form__text form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div><br>

            <div class="form-group col-md-8">
                <label>Emergency Response Team (ERT)</label><br>
                <div class="form-check form-check-inline mb-3">
                    <label class="radio ul-form__radio-inline pr-2 ">
                        <input type="radio" name="ert" value="1">
                        <span>Ada</span>
                        <span class="checkmark"></span>
                    </label>
                    <label class="radio radio-secondary pr-2">
                        <input type="radio" name="ert" value="0">
                        <span>Tiada</span>
                        <span class="checkmark"></span>
                    </label>
                </div>
                @error('ert')
                <div class="ul-form__text form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-row col-md-12">
                <div class="form-group col-md-8">
                    <label class="ul-form__label">Nama PIC:</label>
                    <input type="text" class="form-control @error('pic_name') is-invalid @enderror" name="pic_name" value="{{ old('pic_name') }}" placeholder="Nama penuh">
                    @error('pic_name')
                    <div class="ul-form__text form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-4">
                    <label class="ul-form__label">Nombor Telefon PIC:</label>
                    <input type="text" class="form-control @error('pic_phone') is-invalid @enderror" name="pic_phone" value="{{ old('pic_phone') }}" placeholder="No. telefon PIC">
                    @error('pic_phone')
                    <div class="ul-form__text form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row col-md-12">
                <div class="form-group col-md-8">
                    <label class="ul-form__label">Nama FC:</label>
                    <input type="text" class="form-control @error('fc_name') is-invalid @enderror" name="fc_name" value="{{ old('fc_name') }}" placeholder="Nama penuh">
                    @error('fc_name')
                    <div class="ul-form__text form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-4">
                    <label class="ul-form__label">Nombor Telefon FC:</label>
                    <input type="text" class="form-control @error('fc_phone') is-invalid @enderror" name="fc_phone" value="{{ old('fc_phone') }}" placeholder="No. telefon FC">
                    @error('fc_phone')
                    <div class="ul-form__text form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group col-md-8">
                <label class="ul-form__label">Balai:</label>
                <select name="office_id" class="custom-select @error('office_id') is-invalid @enderror">
                    <option value="">Sila pilih balai</option>
                    @foreach($offices as $office)
                        <option value="{{ $office->id }}" {{ (old('office_id') == $office->id) ? 'selected' : '' }}>{{ $office->name }}</option>
                    @endforeach
                </select>
                @error('office_id')
                <div class="ul-form__text form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

    </div>
    <div class="card-footer">
        <div class="mc-footer">
            <div class="row">
                <div class="col-lg-12 text-right">
                    <button type="submit" class="btn  btn-primary m-1">Hantar</button>
                    <button type="reset" class="btn btn-outline-secondary m-1">Tetapkan Semula</button>
                </div>
            </div>
        </div>
    </div>
