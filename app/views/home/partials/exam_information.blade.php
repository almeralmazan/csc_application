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
                <label for="exam-mode">Exam mode <span class="required">*</span></label>
            </div>
            <div class="col-md-3">
                <select id="exam-mode" name="new_exam_mode" class="form-control">
                    <option value="empty" selected>-- Select Exam Mode --</option>
                    <option value="ppt">Paper-and-Pencil Test (PPT)</option>
                    <option value="cat">Computer-Assisted Test (CAT)</option>
                </select>
                <span class="alert-danger">{{ $errors->first('new_exam_mode') }}</span>
            </div>
        </div>
        <div class="row form-category-row">
            <div class="col-md-3">
                <label for="exam-level">Exam level <span class="required">*</span></label>
            </div>
            <div class="col-md-3 exam-level">
                <select id="exam-level" name="new_exam_level" class="form-control">
                    <option value="empty" selected>-- Select Exam Level --</option>
                    <option value="Sub Pro">CSE - Sub professional</option>
                    <option value="Professional">CSE - Professional</option>
                </select>
                <span class="alert-danger">{{ $errors->first('new_exam_level') }}</span>
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
                <label for="testing-center-location">Testing Centers <span class="required">*</span></label>
            </div>
            <div class="col-md-3">
                <select class="form-control" id="testing-center-location" name="testing_centers_location">
                    <option value="empty" selected>-- Select Testing Centers --</option>
                    @foreach ($locations as $loc)
                        <option value="{{ $loc->id }}">{{ $loc->location }}</option>
                    @endforeach
                </select>
                <span class="alert-danger">{{ $errors->first('testing_centers_location') }}</span>
            </div>
        </div>

        <!-- MODAL -->
        @include('home.partials.modal-add-schedule')

        <div class="row form-category-row">
            <div class="col-md-3">
                <label>Date Start <span class="required">*</span></label>
            </div>
            <div class="col-md-3">
                <input class="form-control" id="date-start" type="text" name="schedule_date_start" readonly>
                <span class="alert-danger">{{ $errors->first('schedule_date_start') }}</span>
            </div>
        </div>
        <div class="row form-category-row">
            <div class="col-md-3">
                <label>Time start <span class="required">*</span></label>
            </div>
            <div class="col-md-3">
                <input class="form-control" id="time-start" type="text" name="schedule_time_start" readonly>
                <span class="alert-danger">{{ $errors->first('schedule_time_start') }}</span>
            </div>
        </div>
        <div class="row form-category-row">
            <div class="col-md-3">
                <label>Time end <span class="required">*</span></label>
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
                <div class="input-group date form_date col-md-12" data-date="{{ date('Y-m-d') }}" data-date-format="yyyy-mm-dd" data-link-field="dtp_input3">
                    <input  name="previous_date_exam" class="form-control" size="16" type="text" value="{{ e(Input::old('previous_date_exam')) }}" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
            </div>
        </div>
    </div>
</div>
