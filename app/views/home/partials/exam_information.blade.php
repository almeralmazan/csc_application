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
                <input type="text" class="form-control" id="csid-no" name="exam_information_csid_no" placeholder="Ex. 1000-0-1">
            </div>
        </div>
        <div class="row form-category-row">
            <div class="col-md-3">
                <label for="exam-mode">Exam mode</label>
            </div>
            <div class="col-md-3">
                <select id="exam-mode" name="exam_mode" class="form-control">
                    <option value="" selected>-- Select Exam Mode --</option>
                    <option value="ppt">Paper-and-Pencil Test (PPT)</option>
                    <option value="cat">Computer-Assisted Test (CAT)</option>
                </select>
            </div>
        </div>
        <div class="row form-category-row">
            <div class="col-md-3">
                <label for="exam-level">Exam level</label>
            </div>
            <div class="col-md-3 exam-level">
                <select id="exam-level" name="exam_level" class="form-control">
                    <option value="" selected>-- Select Exam Level --</option>
                    <option value="subpro">CSE - Sub professional</option>
                    <option value="pro">CSE - Professional</option>
                </select>
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
                <label for="testing-center-location">Testing Centers</label>
            </div>
            <div class="col-md-3">
                <select class="form-control">
                    <option value="" selected>-- Select Testing Centers --</option>
                    @foreach ($locations as $loc)
                        <option value="{{ $loc->location }}">{{ $loc->location }}</option>
                    @endforeach

                </select>
            </div>
        </div>
        <div class="row form-category-row">
            <div class="col-md-3">
            </div>
            <div class="col-md-3">
                <a href="#">View Schedules</a>
            </div>
        </div>
<!--        <div class="row form-category-row">-->
<!--            <div class="col-md-3">-->
<!--                <label>Date Start</label>-->
<!--            </div>-->
<!--            <div class="col-md-3">-->
<!--                <div class="input-group date form_date col-md-12" data-date="" data-date-format="MM d, yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">-->
<!--                    <input class="form-control" size="16" type="text" value="" readonly>-->
<!--                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>-->
<!--                </div>-->
<!--                <input type="hidden" id="dtp_input2" value="" />-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="row form-category-row">-->
<!--            <div class="col-md-3">-->
<!--                <label>Date end</label>-->
<!--            </div>-->
<!--            <div class="col-md-3">-->
<!--                <div class="input-group date form_date col-md-12" data-date="" data-date-format="MM d, yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">-->
<!--                    <input class="form-control" size="16" type="text" value="" readonly>-->
<!--                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>-->
<!--                </div>-->
<!--                <input type="hidden" id="dtp_input2" value="" />-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="row form-category-row">-->
<!--            <div class="col-md-3">-->
<!--                <label>Time start</label>-->
<!--            </div>-->
<!--            <div class="col-md-3">-->
<!--                <input class="form-control" type="text" readonly>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="row form-category-row">-->
<!--            <div class="col-md-3">-->
<!--                <label>Time end</label>-->
<!--            </div>-->
<!--            <div class="col-md-3">-->
<!--                <input class="form-control" type="text" readonly>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="row form-category-row">-->
<!--            <div class="col-md-3">-->
<!--                <label for="location">Location</label>-->
<!--            </div>-->
<!--            <div class="col-md-3">-->
<!--                <input class="form-control" type="text" id="location">-->
<!--            </div>-->
<!--        </div>-->
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
                <label for="exam-mode">Exam Level</label>
            </div>
            <div class="col-md-3 exam-level">
                <select class="form-control">
                    <option value="" selected>-- Select Exam Level --</option>
                    <option value="previous_subpro">CSE - Sub professional</option>
                    <option value="previous_pro">CSE - Professional</option>
                </select>
            </div>
        </div>
        <div class="row form-category-row">
            <div class="col-md-3">
                <label>Date of Exam Taken</label>
            </div>
            <div class="col-md-3">
                <div class="input-group date form_date col-md-12" data-date="" data-date-format="MM d, yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input class="form-control" size="16" type="text" name="previous_date_exam_taken" value="" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
                <input type="hidden" id="dtp_input2" value="" />
            </div>
        </div>
    </div>
</div>
