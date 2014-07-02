<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title form-category-title">Facts of Birth</h3>
    </div>
    <div class="panel-body">
        <div class="row form-category-row">
            <div class="col-md-3">
                <label for="gender">Gender</label>
            </div>
            <div class="col-md-2">
                <select class="form-control" id="gender" name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
        </div>
        <div class="row form-category-row">
            <div class="col-md-3">
                <label for="date">Date of Birth</label>
            </div>
            <div class="col-md-6">
                <div class="input-group date form_date col-md-5" data-date="" data-date-format="MM d, yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input name="date_of_birth" class="form-control" size="16" type="text" value="" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
            </div>
        </div>
        <div class="row form-category-row">
            <div class="col-md-3">
                <label for="place-of-birth">Place of Birth</label>
            </div>
            <div class="col-md-2 place-of-birth">
                <select class="form-control" id="place-of-birth" name="place_of_birth">
                    <option value="Philippines" selected>Philippines</option>
                </select>
            </div>
            <div class="col-md-3 place-of-birth">
                <select class="form-control" name="cities_and_provinces">
                    <option value="" selected>-- Select City or Province --</option>
                    @foreach ($cities_and_provinces as $cp)
                    <option value="{{ $cp->name }}">{{ $cp->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row form-category-row">
            <div class="col-md-3">
                <label for="last-name">Mother's Maiden Name</label>
            </div>
            <div class="col-md-2 maiden-name">
                <input class="form-control" id="last-name" name="maiden_last_name" type="text" placeholder="Last name">
            </div>
            <div class="col-md-3 maiden-name">
                <input class="form-control" name="maiden_first_name" type="text" placeholder="First name">
            </div>
            <div class="col-md-3 maiden-name">
                <input class="form-control" name="maiden_middle_name" type="text" placeholder="Middle name">
            </div>
        </div>
    </div>
</div>
