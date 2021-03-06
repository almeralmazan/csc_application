<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title form-category-title">Current demographic data</h3>
    </div>
    <div class="panel-body">
        <div class="row form-category-row">
            <div class="col-md-3">
                <label for="address">Address <span class="required">*</span></label>
            </div>
            <div class="col-md-6 address">
                <input disabled id="address" class="form-control" type="text" name="address" value="{{ e(Input::old('address')) }}" placeholder="# Street, Barangay, City or Province">
                <span class="alert-danger">{{ $errors->first('address') }}</span>
            </div>
        </div>
        <div class="row form-category-row">
            <div class="col-md-3">
            </div>
        </div>
        <div class="row form-category-row">
            <div class="col-md-3">
                <label for="citizenship">Citizenship <span class="required">*</span></label>
            </div>
            <div class="col-md-2">
                <input disabled type="text" class="form-control" id="citizenship" name="citizenship" value="{{ e(Input::old('citizenship')) }}" placeholder="Filipino" readonly>
                <span class="alert-danger">{{ $errors->first('citizenship') }}</span>
            </div>
        </div>
        <div class="row form-category-row">
            <div class="col-md-3">
                <label for="civil-status">Civil status <span class="required">*</span></label>
            </div>
            <div class="col-md-2 civil-status">
                <select disabled class="form-control" id="civil-status" name="civil_status">
                    <option value="Single" selected>Single</option>
                    <option value="Married">Married</option>
                    <option value="Widowed">Widowed</option>
                    <option value="Legally Separated">Legally Separated</option>
                    <option value="Anulled">Anulled</option>
                </select>
                <span class="alert-danger">{{ $errors->first('civil_status') }}</span>
            </div>
        </div>
        <div class="row form-category-row">
            <div class="col-md-3">
                <label for="mobile-number">Mobile # <span class="required">*</span></label>
            </div>
            <div class="col-md-3">
                <input disabled class="form-control phoneInput"
                       maxlength="11"
                       id="mobile-number"
                       name="mobile_number"
                       type="text"
                       placeholder="Ex. format:  09439115188"
                       required>
                <span class="alert-danger">{{ $errors->first('mobile_number') }}</span>
            </div>
        </div>
        <div class="row form-category-row">
            <div class="col-md-3">
                <label for="phone-number">Phone #</label>
            </div>
            <div class="col-md-3">
                <input disabled class="form-control phoneInput" maxlength="15" id="phone-number" name="phone_number" type="text" placeholder="(optional)">
                <span class="alert-danger">{{ $errors->first('phone_number') }}</span>
            </div>
        </div>
        <div class="row form-category-row">
            <div class="col-md-3">
                <label for="email">Email <span class="required">*</span></label>
            </div>
            <div class="col-md-6">
                <input style="width: 205px" disabled class="pull-left form-control" id="email" type="email" name="email" placeholder="Email Address">
                    <label class="pull-left" style="padding-left: 15px">
                        <input id="replace-email" type="checkbox"> Replace existing email?
                    </label>
                <span class="alert-danger">{{ $errors->first('email') }}</span>
            </div>
        </div>
    </div>
</div>
