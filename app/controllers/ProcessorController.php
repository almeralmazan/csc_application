<?php

class ProcessorController extends BaseController {

    public function index()
    {
        $title = 'Paid Applicants Page';
        $applicants = Applicant::getPaidStatus(1);
        return View::make('processor.index', compact('title', 'applicants'));
    }

    public function reserved()
    {
        $title = 'Reserved Applicants Page';
        $applicants = Applicant::getPaidStatus(0);
        return View::make('processor.reserved', compact('title', 'applicants'));
    }

    public function listOfPassers()
    {
        $title = 'List Of Passers';
        return View::make('processor.list-of-passers', compact('title'));
    }

    public function getAllPaidApplicants()
    {
        return DB::table('applicants')
                ->select(
                    'applicants.id',
                    'payments.transaction_number',
                    'applicants.applicant_last_name',
                    'applicants.applicant_first_name',
                    'applicants.schedule_date_start',
                    'applicants.new_exam_level'
                )
                ->join('payments', 'payments.applicant_id', '=', 'applicants.id')
                ->where('paid_status', 1)
                ->get();
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
        // Initiate sms sending to applicant
        $account_sid = $_ENV['TWILIO_SID'];
        $auth_token = $_ENV['TWILIO_AUTH_TOKEN'];
        $client = new Services_Twilio($account_sid, $auth_token);

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

            $client->account->messages->create(array(
                'To' => $applicant->mobile_number,
                'From' => $_ENV['TWILIO_ACCOUNT_NUMBER'],
                'Body' => $applicant->applicant_first_name . ' ' . $applicant->applicant_last_name .
                    ', your application form is approved. From Civil Service Commission'
            ));
        }
        else
        {
            $client->account->messages->create(array(
                'To' => $applicant->mobile_number,
                'From' => $_ENV['TWILIO_ACCOUNT_NUMBER'],
                'Body' => $applicant->applicant_first_name . ' ' . $applicant->applicant_last_name .
                    ', your application form is approved. From Civil Service Commission'
            ));
        }
    }

    public function smsDisapprove($email)
    {
        $inappropriatePicture = Input::get('inappropriate_picture');
        $lack_of_requirements = Input::get('lack_of_requirements');
        $invalid_id = Input::get('invalid_id');

        // Initiate sms sending to applicant
        $account_sid = $_ENV['TWILIO_SID'];
        $auth_token = $_ENV['TWILIO_AUTH_TOKEN'];
        $client = new Services_Twilio($account_sid, $auth_token);

        // Find applicant by email
        $applicant = DB::table('applicants')
                        ->select(
                            'id',
                            'applicant_status',
                            'applicant_first_name',
                            'applicant_last_name',
                            'mobile_number'
                        )
                        ->where('email', $email)
                        ->first();

        // Delete applicant
        DB::table('applicants')->where('id', $applicant->id)->delete();

        // Delete payments of applicant
        DB::table('payments')->where('applicant_id', $applicant->id)->delete();


        $reasons = '';

        if ( isset($inappropriatePicture) )
        {
            $reasons .= $inappropriatePicture . "\n";
        }

        if ( isset($lack_of_requirements) )
        {
            $reasons .= $lack_of_requirements . "\n";
        }

        if ( isset($invalid_id) )
        {
            $reasons .= $invalid_id;
        }

        $client->account->messages->create(array(
            'To' => $applicant->mobile_number,
            'From' => $_ENV['TWILIO_ACCOUNT_NUMBER'],
            'Body' => $applicant->applicant_first_name . ' ' . $applicant->applicant_last_name .
                ', your application form has been disapproved.' . "\nReasons:\n" . $reasons
        ));

        return Redirect::back()->withMessage(
            $applicant->applicant_first_name . ' ' . $applicant->applicant_last_name . ' has been deleted in the database'
        );
    }

    public function smsPassed($email)
    {
        // Initiate sms sending to applicant
        $account_sid = $_ENV['TWILIO_SID'];
        $auth_token = $_ENV['TWILIO_AUTH_TOKEN'];
        $client = new Services_Twilio($account_sid, $auth_token);

        // Find applicant by email
        $applicant = DB::table('applicants')
            ->select(
                'exam_status',
                'applicant_first_name',
                'applicant_last_name',
                'mobile_number'
            )
            ->where('email', $email)
            ->first();

        if ($applicant->exam_status == 0)
        {
            DB::table('applicants')
                ->where('email', '=', $email)
                ->update(array('exam_status' => 1));

            $client->account->messages->create(array(
                'To' => $applicant->mobile_number,
                'From' => $_ENV['TWILIO_ACCOUNT_NUMBER'],
                'Body' => $applicant->applicant_first_name . ' ' . $applicant->applicant_last_name .
                    ', you passed in examination. From Civil Service Commission'
            ));
        }
        else
        {
            $client->account->messages->create(array(
                'To' => $applicant->mobile_number,
                'From' => $_ENV['TWILIO_ACCOUNT_NUMBER'],
                'Body' => $applicant->applicant_first_name . ' ' . $applicant->applicant_last_name .
                    ', you passed in examination. From Civil Service Commission'
            ));
        }
    }

    public function smsFailed($email)
    {
        // Initiate sms sending to applicant
        $account_sid = $_ENV['TWILIO_SID'];
        $auth_token = $_ENV['TWILIO_AUTH_TOKEN'];
        $client = new Services_Twilio($account_sid, $auth_token);

        // Find applicant by email
        $applicant = DB::table('applicants')
            ->select(
                'exam_status',
                'applicant_first_name',
                'applicant_last_name',
                'mobile_number'
            )
            ->where('email', $email)
            ->first();

        if ($applicant->exam_status == 0)
        {
            $client->account->messages->create(array(
                'To' => $applicant->mobile_number,
                'From' => $_ENV['TWILIO_ACCOUNT_NUMBER'],
                'Body' => $applicant->applicant_first_name . ' ' . $applicant->applicant_last_name .
                    ', you failed in examination. From Civil Service Commission'
            ));
        }
        else
        {
            DB::table('applicants')
                ->where('email', '=', $email)
                ->update(array('exam_status' => 0));

            $client->account->messages->create(array(
                'To' => $applicant->mobile_number,
                'From' => $_ENV['TWILIO_ACCOUNT_NUMBER'],
                'Body' => $applicant->applicant_first_name . ' ' . $applicant->applicant_last_name .
                    ', you failed in examination. From Civil Service Commission'
            ));
        }
    }

    public function smsPaid($email)
    {
        // Initiate sms sending to applicant
        $account_sid = $_ENV['TWILIO_SID'];
        $auth_token = $_ENV['TWILIO_AUTH_TOKEN'];
        $client = new Services_Twilio($account_sid, $auth_token);

        // Find applicant by email
        $applicant = DB::table('applicants')
            ->select(
                'paid_status',
                'applicant_first_name',
                'applicant_last_name',
                'mobile_number'
            )
            ->where('email', $email)
            ->first();

        if ($applicant->paid_status == 1)
        {
            $client->account->messages->create(array(
                'To' => $applicant->mobile_number,
                'From' => $_ENV['TWILIO_ACCOUNT_NUMBER'],
                'Body' => $applicant->applicant_first_name . ' ' . $applicant->applicant_last_name .
                    ', you are paid for the examination. From Civil Service Commission'
            ));
        }
        else
        {
            DB::table('applicants')
                ->where('email', '=', $email)
                ->update(array('paid_status' => 1));

            $client->account->messages->create(array(
                'To' => $applicant->mobile_number,
                'From' => $_ENV['TWILIO_ACCOUNT_NUMBER'],
                'Body' => $applicant->applicant_first_name . ' ' . $applicant->applicant_last_name .
                    ', you are paid for the examination. From Civil Service Commission'
            ));
        }
    }
}