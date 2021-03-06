<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title form-category-title">Facts of Birth</h3>
    </div>
    <div class="panel-body">
        <div class="row form-category-row">
            <div class="col-md-3">
                <label for="gender">Gender <span class="required">*</span></label>
            </div>
            <div class="col-md-2">
                <select disabled class="form-control" id="gender" name="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
        </div>
        <div class="row form-category-row">
            <div class="col-md-3">
                <label for="date">Date of Birth <span class="required">*</span></label>
            </div>
            <div class="col-md-6">
                <div class="input-group date form_date col-md-5" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input disabled name="date_of_birth" id="date-of-birth" class="form-control" size="16" type="text" value="{{ e(Input::old('date_of_birth')) }}" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
                <span class="alert-danger">{{ $errors->first('date_of_birth') }}</span>
            </div>
        </div>
        <div class="row form-category-row">
            <div class="col-md-3">
                <label for="place-of-birth">Place of Birth <span class="required">*</span></label>
            </div>
            <div class="col-md-3 place-of-birth">
                <select disabled id="place-of-birth" class="form-control" name="place_of_birth">
                    <option value="empty" selected>-- Select Place of Birth--</option>
                    @foreach ($cities_and_provinces as $cp)
                    <option value="{{ $cp->name }}">{{ $cp->name }}</option>
                    @endforeach
                </select>
                <span class="alert-danger">{{ $errors->first('place_of_birth') }}</span>
            </div>
        </div>
        <div class="row form-category-row">
            <div class="col-md-3">
                <label for="last-name">Mother's Maiden Name <span class="required">*</span></label>
            </div>
            <div class="col-md-2 maiden-name">
                <input disabled class="form-control" id="maiden-last-name" name="maiden_last_name" value="{{ e(Input::old('maiden_last_name')) }}" type="text" placeholder="Last name">
                <span class="alert-danger">{{ $errors->first('maiden_last_name') }}</span>
            </div>
            <div class="col-md-2 maiden-name">
                <input disabled class="form-control" id="maiden-first-name" name="maiden_first_name" value="{{ e(Input::old('maiden_first_name')) }}" type="text" placeholder="First name">
                <span class="alert-danger">{{ $errors->first('maiden_first_name') }}</span>
            </div>
            <div class="col-md-2 maiden-name">
                <input disabled class="form-control" id="maiden-middle-name" name="maiden_middle_name" value="{{ e(Input::old('maiden_middle_name')) }}" type="text" placeholder="Middle name">
                <span class="alert-danger">{{ $errors->first('maiden_middle_name') }}</span>
            </div>
        </div>
    </div>
</div>
