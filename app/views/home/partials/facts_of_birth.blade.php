<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title form-category-title">Facts of birth</h3>
    </div>
    <div class="panel-body">
        <div class="row form-category-row">
            <div class="col-md-3">
                <label for="gender">Gender</label>
            </div>
            <div class="col-md-2">
                <select class="form-control" id="gender">
                    <option value="">Male</option>
                    <option value="">Female</option>
                </select>
            </div>
        </div>
        <div class="row form-category-row">
            <div class="col-md-3">
                <label for="date">Date
                    of birth</label>
            </div>
            <div class="col-md-6">
                <!-- <input type="text" class="form-control" id="gender" placeholder="Suffix"> -->
                <div class="input-group date form_date col-md-5" data-date="" data-date-format="MM dd, yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input name="date" class="form-control" size="16" type="text" value="" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
                <input type="hidden" id="dtp_input2" value="" />
            </div>
        </div>
        <div class="row form-category-row">
            <div class="col-md-3">
                <label for="place-of-birth">Place of birth</label>
            </div>
            <div class="col-md-2 place-of-birth">
                <select class="form-control" id="place-of-birth">
                    <option value="" selected>Country</option>
                    <option value=""></option>
                </select>
            </div>
            <div class="col-md-3 place-of-birth">
                <select class="form-control">
                    <option value="" selected>--select city or province--</option>
                    <option value=""></option>
                </select>
            </div>
            <div class="col-md-2 place-of-birth">
                <select class="form-control">
                    <option value="" selected>--select--</option>
                    <option value=""></option>
                </select>
            </div>
        </div>
        <div class="row form-category-row">
            <div class="col-md-3">
                <label for="last-name">Mother's maiden name</label>
            </div>
            <div class="col-md-2 maiden-name">
                <input class="form-control" id="last-name" type="text" placeholder="Last name">
            </div>
            <div class="col-md-3 maiden-name">
                <input class="form-control" type="text" placeholder="First name">
            </div>
            <div class="col-md-3 maiden-name">
                <input class="form-control" type="text" placeholder="Middle name">
            </div>
        </div>
    </div>
</div>
