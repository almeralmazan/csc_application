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

        $payment = Payment::find($applicant->id);
        $payment->paid_date = date('Y-m-d');
        $payment->save();

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

    // TWILIO SMS
    public function smsApprove($email)
    {
        // Find applicant by email
        $applicant = DB::table('applicants')
            ->select(
                'applicant_status',
                'applicant_first_name',
                'applicant_last_name',
                'mobile_number'
            )
            ->where('email', $email)
            ->first();

        if ($applicant->applicant_status != 1)
        {
            DB::table('applicants')
                ->where('email', '=', $email)
                ->update(array('applicant_status' => 1));
        }
        else
        {
            return Response::json(['message' => 'Already approved']);
        }


        // Initiate sms sending to applicant
        $account_sid = $_ENV['TWILIO_SID'];
        $auth_token = $_ENV['TWILIO_AUTH_TOKEN'];
        $client = new Services_Twilio($account_sid, $auth_token);

        $client->account->messages->create(array(
            'To' => $applicant->mobile_number,
            'From' => $_ENV['TWILIO_ACCOUNT_NUMBER'],
            'Body' => $applicant->applicant_first_name . ' ' . $applicant->applicant_last_name .
                ', your application form is approved. From Civil Service Commission'
        ));

    }
}