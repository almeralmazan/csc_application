<?php

class ProcessorController extends BaseController {

    public function index()
    {
        $title = 'View Application Page';
        $applicants = Applicant::getPaidStatus(1);
        return View::make('processor.index', compact('title', 'applicants'));
    }

    public function reserved()
    {
        $title = 'Reserved Page';
        $applicants = Applicant::getPaidStatus(0);
        return View::make('processor.reserved', compact('title', 'applicants'));
    }

    public function getAllPaidApplicants()
    {
        return DB::table('applicants')
                ->where('paid_status', 1)
                ->select(
                    'id',
                    'controlno',
                    'applicant_last_name',
                    'applicant_first_name',
                    'schedule_date_start',
                    'new_exam_level'
                )->get();
    }

    public function getAllReservedApplicants()
    {
        return DB::table('applicants')
            ->where('paid_status', 0)
            ->select(
                'id',
                'controlno',
                'applicant_last_name',
                'applicant_first_name',
                'schedule_date_start',
                'new_exam_level'
            )->get();
    }

    public function loginPage()
    {
        $title = 'Processor Login Page';
        return View::make('processor.login-page', compact('title'));
    }

    public function show($applicantId)
    {
        $title = 'Applicant Page';
        $applicant = Applicant::find($applicantId);
        return View::make('processor.show', compact('title', 'applicant'));
    }

    public function updatePage($applicantId)
    {
        $title = 'Applicant Update Page';
        $applicant = Applicant::find($applicantId);
        return View::make('processor.update', compact('title', 'applicant'));
    }

    public function updateStatus($applicantId)
    {
        $applicant = Applicant::find($applicantId);
        $applicant->applicant_status = Input::get('applicant_status');
        $applicant->paid_status = Input::get('paid_status');
        $applicant->exam_status = Input::get('exam_status');
        $applicant->save();

        return Redirect::back()->withMessage('Updated Successfully');
    }
    public function verifyLogin()
    {
        $credentials = Auth::attempt([
            'username' => Input::get('username'),
            'password' => Input::get('password')
        ]);

        if ( ! $credentials)
        {
            return Response::json([
                'success' => false,
                'message' => 'Invalid user/password input'
            ]);
        }

        return Response::json(['success' => true]);
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('processor/login');
    }
}