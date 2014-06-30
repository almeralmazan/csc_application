@extends('layouts.main')

@section('content')
<form class="form-horizontal" role="form">
    <div class="row">
        <div class="col-md-12">
            <h3>Applicant Name</h3>
            <hr>
        </div>
    </div>
    <div class="row form-applicant">
        <div class="col-md-3 applicant-name">
            <input type="text" class="form-control" placeholder="Last name">
        </div>
        <div class="col-md-3 applicant-name">
            <input type="text" class="form-control" placeholder="First name">
        </div>
        <div class="col-md-3 applicant-name">
            <input type="text" class="form-control" placeholder="Middle name">
        </div>
        <div class="col-md-3 applicant-name">
            <input type="text" class="form-control" placeholder="Suffix">
        </div>
    </div><br>
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
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title form-category-title">Current demographic data</h3>
        </div>
        <div class="panel-body">
            <div class="row form-category-row">
                <div class="col-md-3">
                    <label for="address">Address</label>
                </div>
                <div class="col-md-3 address">
                    <select class="form-control" id="address">
                        <option value="" selected>--select city or province--</option>
                        <option value=""></option>
                    </select>
                </div>
                <div class="col-md-2 address">
                    <select class="form-control">
                        <option value="" selected>--select--</option>
                        <option value=""></option>
                    </select>
                </div>
                <div class="col-md-2">
                    <input class="form-control" type="text" placeholder="Baranggay">
                </div>
            </div>
            <div class="row form-category-row">
                <div class="col-md-3">
                    <!-- walang laman to -->
                </div>
                <div class="col-md-2">
                    <input class="form-control" type="text" placeholder="Zip code">
                </div>
            </div>
            <div class="row form-category-row">
                <div class="col-md-3">
                    <label for="citizenship">Citizenship</label>
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" id="citizenship" placeholder="Filipino" readonly>
                </div>
            </div>
            <div class="row form-category-row">
                <div class="col-md-3">
                    <label for="civil-status">Civil status</label>
                </div>
                <div class="col-md-2 civil-status">
                    <select class="form-control" id="civil-status">
                        <option value="" selected>Single</option>
                        <option value="">Married</option>
                        <option value="">Widowed</option>
                        <option value="">Legally separated</option>
                        <option value="">Anulled</option>
                        <option value="">Others</option>
                    </select>
                </div>
                <div class="col-md-3 civil-status">
                    <input type="text" class="form-control" id="citizenship" placeholder="If other, please specify">
                </div>
            </div>
            <div class="row form-category-row">
                <div class="col-md-3">
                    <label for="mobile-number">Mobile #</label>
                </div>
                <div class="col-md-3">
                    <input class="form-control" id="mobile-number" type="text" placeholder="">
                </div>
            </div>
            <div class="row form-category-row">
                <div class="col-md-3">
                    <label for="phone-number">Phone #</label>
                </div>
                <div class="col-md-3">
                    <input class="form-control"  id="phone-number" type="text" placeholder="">
                </div>
            </div>
            <div class="row form-category-row">
                <div class="col-md-3">
                    <label for="email">Email</label>
                </div>
                <div class="col-md-3">
                    <input class="form-control" id="email" type="email" placeholder="">
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title form-category-title">Exam information</h3>
        </div>
        <div class="panel-body">
            <div class="row form-category-row">
                <div class="col-md-3">
                    <label for="csid-no">CSID #</label>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" id="csid-no" placeholder="Filipino">
                </div>
            </div>
            <div class="row form-category-row">
                <div class="col-md-3">
                    <label for="exam-mode">Exam mode</label>
                </div>
                <div class="col-md-3">
                    <select class="form-control">
                        <option value="" selected>--select exam mode--</option>
                        <option value="">Paper and pencil Test</option>
                        <option value="">Computer-assisted Test</option>
                    </select>
                </div>
            </div>
            <div class="row form-category-row">
                <div class="col-md-3">
                    <label for="exam-mode">Exam level</label>
                </div>
                <div class="col-md-3 exam-level">
                    <select class="form-control">
                        <option value="" selected>--select exam level--</option>
                        <option value="">CSE - Sub professional</option>
                        <option value="">CSE - Professional</option>
                        <option value="">Others</option>
                    </select>
                </div>
                <div class="col-md-3 lexam-level">
                    <input class="form-control" type="text" placeholder="If others, specify">
                </div>
            </div>
            <div class="row form-category-row">
                <div class="col-md-3 requirements-subtitle">
                    <span>Available Schedule</span>
                </div>
                <div class="col-md-12">
                    <hr>
                </div>
            </div>
            <div class="row form-category-row">
                <div class="col-md-3">
                    <label for="regional-office">CSC Regional office</label>
                </div>
                <div class="col-md-3">
                    <select class="form-control">
                        <option value="" selected>--Select Regional office--</option>
                    </select>
                </div>
            </div>
            <div class="row form-category-row">
                <div class="col-md-3">
                </div>
                <div class="col-md-3">
                    <a href="#">Schedule</a>
                </div>
            </div>
            <div class="row form-category-row">
                <div class="col-md-3">
                    <label>Date start</label>
                </div>
                <div class="col-md-3">
                    <!-- <input type="text" class="form-control" id="gender" placeholder="Suffix"> -->
                    <div class="input-group date form_date col-md-12" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                        <input class="form-control" size="16" type="text" value="" readonly>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                    <input type="hidden" id="dtp_input2" value="" />
                </div>
            </div>
            <div class="row form-category-row">
                <div class="col-md-3">
                    <label>Date end</label>
                </div>
                <div class="col-md-3">
                    <!-- <input type="text" class="form-control" id="gender" placeholder="Suffix"> -->
                    <div class="input-group date form_date col-md-12" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                        <input class="form-control" size="16" type="text" value="" readonly>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                    <input type="hidden" id="dtp_input2" value="" />
                </div>
            </div>
            <div class="row form-category-row">
                <div class="col-md-3">
                    <label>Time start</label>
                </div>
                <div class="col-md-3">
                    <input class="form-control" type="text" readonly>
                </div>
            </div>
            <div class="row form-category-row">
                <div class="col-md-3">
                    <label>Time end</label>
                </div>
                <div class="col-md-3">
                    <input class="form-control" type="text" readonly>
                </div>
            </div>
            <div class="row form-category-row">
                <div class="col-md-3">
                    <label for="location">Location</label>
                </div>
                <div class="col-md-3">
                    <input class="form-control" type="text" id="location">
                </div>
            </div>
            <div class="row form-category-row">
                <div class="col-md-3">
                    <label for="verified-as">Verified as</label>
                </div>
                <div class="col-md-3">
                    <select class="form-control">
                        <option value="" selected>--Select applicant type--</option>
                    </select>
                </div>
            </div>
            <div class="row form-category-row">
                <div class="col-md-3 requirements-subtitle">
                    <span>Previous exam taken</span>
                </div>
                <div class="col-md-12">
                    <hr>
                </div>
            </div>
            <div class="row form-category-row">
                <div class="col-md-3">
                    <label for="exam-mode">Exam level</label>
                </div>
                <div class="col-md-3 exam-level">
                    <select class="form-control">
                        <option value="" selected>--select exam level--</option>
                        <option value="">CSE - Sub professional</option>
                        <option value="">CSE - Professional</option>
                        <option value="">Others</option>
                    </select>
                </div>
                <div class="col-md-3 exam-level">
                    <input class="form-control" type="text" placeholder="If others, specify">
                </div>
            </div>
            <div class="row form-category-row">
                <div class="col-md-3">
                    <label>Date of exam</label>
                </div>
                <div class="col-md-3">
                    <!-- <input type="text" class="form-control" id="gender" placeholder="Suffix"> -->
                    <div class="input-group date form_date col-md-12" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                        <input class="form-control" size="16" type="text" value="" readonly>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                    <input type="hidden" id="dtp_input2" value="" />
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title form-category-title">Requirements</h3>
        </div>
        <div class="panel-body">
            <div class="row form-category-row">
                <div class="col-md-3">
                    <label for="applicant-photo">Upload ID picture</label>
                </div>
                <div class="col-md-2">
                    <input type="file" id="applicant-photo">
                </div>
            </div>
            <div class="row form-category-row">
                <div class="col-md-3">
                    <label for="type-of-requirements">Requirement #1</label>
                </div>
                <div class="col-md-3 requirements">
                    <select class="form-control" id="type-of-requirements">
                        <option value="" selected>--select type of requirements--</option>
                        <option value=""></option>
                    </select>
                </div>
                <div class="col-md-2 requirements">
                    <input type="file">
                </div>
            </div>
            <div class="row form-category-row">
                <div class="col-md-3">
                    <label for="type-of-requirements">Requirement #2</label>
                </div>
                <div class="col-md-3 requirements">
                    <select class="form-control" id="type-of-requirements">
                        <option value="" selected>--select type of requirements--</option>
                        <option value=""></option>
                    </select>
                </div>
                <div class="col-md-2 requirements">
                    <input type="file">
                </div>
            </div>
        </div>
    </div>
</form>
@stop