<?php

class SharedController extends BaseController {

    public function searchFullName($fullName)
    {
        $result = Applicant::getApplicantStatus($fullName);

        if (empty($result))
        {
            return Response::json(['success' => false, 'message' => 'No results']);
        }

        return Response::json(['success' => true, 'message' => $result]);
    }
}