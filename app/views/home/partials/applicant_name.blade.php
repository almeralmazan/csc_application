<div class="row">
    <div class="col-md-12">
        <h3>Applicant Name</h3>
        <hr>
    </div>
</div>
<div class="row form-applicant">
    <div class="col-md-3 applicant-name">
        <input type="text" class="form-control" name="applicant_last_name" value="{{ Input::old('applicant_last_name') }}" placeholder="Last Name" autofocus>
        {{ $errors->first('applicant_last_name') }}
    </div>
    <div class="col-md-3 applicant-name">
        <input type="text" class="form-control" name="applicant_first_name" value="{{ Input::old('applicant_first_name') }}" placeholder="First Name">
        {{ $errors->first('applicant_first_name') }}
    </div>
    <div class="col-md-3 applicant-name">
        <input type="text" class="form-control" name="applicant_middle_name" value="{{ Input::old('applicant_middle_name') }}" placeholder="Middle Name">
        {{ $errors->first('applicant_middle_name') }}
    </div>
    <div class="col-md-3 applicant-name">
        <input type="text" class="form-control" name="applicant_suffix" value="{{ Input::old('applicant_suffix') }}" placeholder="Suffix ex. Jr, Sr">
        {{ $errors->first('applicant_suffix') }}
    </div>
</div>

<br>
