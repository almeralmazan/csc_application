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
                {{ Form::file('picture_photo', ['id' => 'applicant-photo']) }}
            </div>
        </div>
        <div class="row form-category-row">
            <div class="col-md-3">
                <label for="type-of-requirements">Requirement #1</label>
            </div>
            <div class="col-md-3 requirements">
                <select class="form-control" id="type-of-requirement-1" name="requirement_type_1">
                    <option value="empty" selected>-- Select Type of Requirements --</option>
                    @foreach ($requirements as $requirement)
                    <option value="{{ $requirement->type }}">{{ $requirement->type }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2 requirements">
                {{ Form::file('first_requirement_image') }}
            </div>
        </div>
        <div class="row form-category-row">
            <div class="col-md-3">
                <label for="type-of-requirements">Requirement #2</label>
            </div>
            <div class="col-md-3 requirements">
                <select class="form-control" id="type-of-requirement-2" name="requirement_type_2">
                    <option value="empty" selected>-- Select Type of Requirements --</option>
                    @foreach ($requirements as $requirement)
                    <option value="{{ $requirement->type }}">{{ $requirement->type }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2 requirements">
                {{ Form::file('second_requirement_image') }}
            </div>
        </div>
    </div>
</div>
