<!-- Modal for disapprove-->
<div class="modal fade" id="adminModal-disapproved" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Notify Applicant's Error</h4>
            </div>
            {{ Form::open(['url' => "admin-disapprove/$applicant->email"]) }}
                <div class="modal-body">
                        <ul class="list-unstyled">
                            <li>
                                <label>
                                    {{ Form::checkbox('inappropriate_picture', 'Inappropriate picture') }} Inappropriate picture
                                </label>
                            </li>
                            <li>
                                <label>
                                    {{ Form::checkbox('lack_of_requirements', 'Lack of requirements') }} Lack of requirements
                                </label>
                            </li>
                            <li>
                                <label>
                                    {{ Form::checkbox('invalid_id', 'Invalid ID') }} Invalid ID
                                </label>
                            </li>
                        </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    {{ Form::submit('Confirm and Send SMS', ['class' => 'btn btn-primary']) }}
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>