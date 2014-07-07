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
                <input class="form-control" type="text" name="address" value="{{ e(Input::old('address')) }}" placeholder="# Street, Barangay, City or Province">
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
                <input type="text" class="form-control" id="citizenship" name="citizenship" value="{{ e(Input::old('citizenship')) }}" placeholder="Filipino" readonly>
                <span class="alert-danger">{{ $errors->first('citizenship') }}</span>
            </div>
        </div>
        <div class="row form-category-row">
            <div class="col-md-3">
                <label for="civil-status">Civil status <span class="required">*</span></label>
            </div>
            <div class="col-md-2 civil-status">
                <select class="form-control" id="civil-status" name="civil_status">
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
                <input class="form-control" id="mobile-number" name="mobile_number" type="text" placeholder="Example format:  09439115188">
                <span class="alert-danger">{{ $errors->first('mobile_number') }}</span>
            </div>
        </div>
        <div class="row form-category-row">
            <div class="col-md-3">
                <label for="phone-number">Phone #</label>
            </div>
            <div class="col-md-3">
                <input class="form-control" id="phone-number" name="phone_number" type="text" placeholder="(optional)">
                <span class="alert-danger">{{ $errors->first('phone_number') }}</span>
            </div>
        </div>
        <div class="row form-category-row">
            <div class="col-md-3">
                <label for="email">Email <span class="required">*</span></label>
            </div>
            <div class="col-md-3">
                <input class="form-control" id="email" type="email" name="email" placeholder="Email Address">
                <span class="alert-danger">{{ $errors->first('email') }}</span>
            </div>
        </div>
    </div>
</div>
