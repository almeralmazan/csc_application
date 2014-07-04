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
                <input type="text" class="form-control" id="csid-no" name="csid_no" placeholder="Ex. 1000-0-1">
            </div>
        </div>
        <div class="row form-category-row">
            <div class="col-md-3">
                <label for="exam-mode">Exam mode</label>
            </div>
            <div class="col-md-3">
                <select id="exam-mode" name="new_exam_mode" class="form-control">
                    <option value="empty" selected>-- Select Exam Mode --</option>
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
                <select id="exam-level" name="new_exam_level" class="form-control">
                    <option value="empty" selected>-- Select Exam Level --</option>
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
                <select class="form-control" name="testing_centers_location">
                    <option value="empty" selected>-- Select Testing Centers --</option>
                    @foreach ($locations as $loc)
                        <option value="{{ $loc->location }}">{{ $loc->location }}</option>
                    @endforeach
                </select>
                <span class="alert-danger">{{ $errors->first('testing_centers_location') }}</span>
            </div>
        </div>

        @include('admin.modal-add-schedule')

        <div class="row form-category-row">
            <div class="col-md-3">
                <label>Date Start</label>
            </div>
            <div class="col-md-3">
                <input class="form-control" id="date-start" type="text" name="schedule_date_start" readonly>
                <span class="alert-danger">{{ $errors->first('schedule_date_start') }}</span>
            </div>
        </div>
        <div class="row form-category-row">
            <div class="col-md-3">
                <label>Time start</label>
            </div>
            <div class="col-md-3">
                <input class="form-control" id="time-start" type="text" name="schedule_time_start" readonly>
                <span class="alert-danger">{{ $errors->first('schedule_time_start') }}</span>
            </div>
        </div>
        <div class="row form-category-row">
            <div class="col-md-3">
                <label>Time end</label>
            </div>
            <div class="col-md-3">
                <input class="form-control" id="time-end" type="text" name="schedule_time_end" readonly>
                <span class="alert-danger">{{ $errors->first('schedule_time_end') }}</span>
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
                <label for="exam-mode">Exam Level</label>
            </div>
            <div class="col-md-3 exam-level">
                <select class="form-control" name="previous_exam_level">
                    <option value="empty" selected>-- Select Exam Level --</option>
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
            </div>
        </div>
    </div>
</div>
