<div class="row">
    <div class="col-md-12">
        <h3>Applicant Name <span class="required">*</span></h3>
        <hr>
    </div>
</div>
<div class="row form-applicant">
    <div class="col-md-3 applicant-name">
        <input type="text" class="form-control" name="applicant_last_name" value="{{ e(Input::old('applicant_last_name')) }}" placeholder="Last Name" autofocus>
        <span class="alert-danger">{{ $errors->first('applicant_last_name') }}</span>
    </div>
    <div class="col-md-3 applicant-name">
        <input type="text" class="form-control" name="applicant_first_name" value="{{ e(Input::old('applicant_first_name')) }}" placeholder="First Name">
        <span class="alert-danger">{{ $errors->first('applicant_first_name') }}</span>
    </div>
    <div class="col-md-3 applicant-name">
        <input type="text" class="form-control" name="applicant_middle_name" value="{{ e(Input::old('applicant_middle_name')) }}" placeholder="Middle Name">
        <span class="alert-danger">{{ $errors->first('applicant_middle_name') }}</span>
    </div>

    <div class="col-md-1 applicant-name">
        <input type="text" class="form-control" name="applicant_middle_name" value="" placeholder="Mi">
        <span class="alert-danger">{{ $errors->first('applicant_middle_initial') }}</span>
    </div>

    <div class="col-md-2 applicant-name">
        <input type="text" class="form-control" name="applicant_suffix" value="{{ e(Input::old('applicant_suffix')) }}" placeholder="Suffix">
        <span class="alert-danger">{{ $errors->first('applicant_suffix') }}</span>
    </div>
</div>

<br>
