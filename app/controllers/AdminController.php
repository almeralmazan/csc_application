<?php

class AdminController extends BaseController
{

    public function index()
    {
        $title = 'View Application Page';
        return View::make('admin.view-application', compact('title'));
    }

    public function paid()
    {
        $title = 'Paid Page';
        $applicants = Applicant::getPaidStatus(1);
        return View::make('admin.paid', compact('title', 'applicants'));
    }

    public function reserved()
    {
        $title = 'Reserved Page';
        $applicants = Applicant::getPaidStatus(0);
        return View::make('admin.reserved', compact('title', 'applicants'));
    }

    public function listOfPassers()
    {
        $title = 'List of Passers Page';
        return View::make('admin.list-of-passers', compact('title'));
    }

    public function schedules()
    {
        $title = 'Schedules Page';
        $locations = TestingCenter::all();
        $schedules = Schedule::getAllSchedules();
        return View::make('admin.schedules', compact('title', 'locations', 'schedules'));
    }

    public function users()
    {
        $title = 'Users Page';
        $users = User::all();
        return View::make('admin.users', compact('title', 'users'));
    }

    public function reports()
    {
        $title = 'Reports Page';
        $applicants = DB::table('applicants')
            ->join('payments', 'payments.applicant_id', '=', 'applicants.id')
            ->where('paid_status', 1)
            ->select(
                'payments.paid_date',
                'applicants.applicant_last_name',
                'applicants.applicant_first_name',
                'applicants.new_exam_level',
                'payments.price'
            )
            ->orderBy('payments.paid_date')
            ->get();

        return View::make('admin.reports', compact('title', 'applicants'));
    }

    public function getAllReports($dateStart, $dateEnd)
    {
        return DB::table('applicants')
            ->join('payments', 'payments.applicant_id', '=', 'applicants.id')
            ->where('payments.paid_date', '!=', '0000-00-00')
            ->whereBetween('payments.paid_date', array($dateStart, $dateEnd))
            ->select(
                'applicants.applicant_last_name',
                'applicants.applicant_first_name',
                'applicants.new_exam_level',
                'payments.paid_date',
                'payments.price'
            )
            ->get();
    }

    public function getAllApplicants()
    {
        return DB::table('applicants')
            ->select(
                'id',
                'controlno',
                'applicant_last_name',
                'applicant_first_name',
                'schedule_date_start',
                'new_exam_level'
            )->get();
    }

    public function getAllPassedApplicants()
    {
        return Applicant::getAllPassedApplicants();
    }

    public function show($applicantId)
    {
        $title = 'Applicant Page';
        $applicant = Applicant::find($applicantId);
        return View::make('admin.show', compact('title', 'applicant'));
    }

    public function addUser()
    {
        $rules = [
            'name' => 'required',
            'username' => 'required',
            'role' => 'required|in:admin,processor',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ];

        $validation = Validator::make(Input::all(), $rules);

        if ($validation->fails()) {
            return Redirect::back()->withInput()->withErrors($validation->messages());
        } else {
            User::create([
                'name' => Input::get('name'),
                'username' => Input::get('username'),
                'role' => Input::get('role'),
                'password' => Hash::make(Input::get('password'))
            ]);

            // Redirect with flash message
            return Redirect::back()->withMessage('User successfully created');
        }
    }

    public function deleteUser($userId)
    {
        $user = User::find($userId);
        $user->delete();

        return Redirect::back();
    }

    public function addSchedule()
    {
        $rules = [
            'admin_add_testing_centers' => 'not_in:empty',
            'admin_add_date_start' => 'required',
            'admin_add_time_start' => 'required',
            'admin_add_time_end' => 'required',
        ];

        $messages = [
            'admin_add_testing_centers.not_in' => 'Location is required *',
            'admin_add_date_start.required' => 'Required *',
            'admin_add_time_start.required' => 'Required *',
            'admin_add_time_end.required' => 'Required *',
        ];

        $validation = Validator::make(Input::all(), $rules, $messages);

        if ($validation->fails()) {
            return Redirect::back()->withInput()->withErrors($validation->messages());
        } else {
            Schedule::create([
                'testing_center_id' => Input::get('admin_add_testing_centers'),
                'date_start' => Input::get('admin_add_date_start'),
                'time_start' => Input::get('admin_add_time_start'),
                'time_end' => Input::get('admin_add_time_end')
            ]);

            // Redirect with flash message
            return Redirect::back()->withMessage('User successfully created');
        }
    }

    public function deleteSchedule($scheduleId, $testingCenterId)
    {
        DB::table('schedules')
            ->where('id', $scheduleId)
            ->where('testing_center_id', $testingCenterId)
            ->delete();

        return Redirect::back();
    }

    public function filterResults()
    {
        if (Request::ajax()) {
            $dateStart = Input::get('search_date_start');
            $dateEnd = Input::get('search_date_end');


            // Total Profit
            $totalProfit = DB::select(
                'SELECT SUM(payments.price) AS total_profit
                  FROM payments
                  WHERE payments.paid_date != ?
                  AND payments.paid_date BETWEEN ? AND ?',
                array('0000-00-00', $dateStart, $dateEnd)
            );

            // Total Pro
            $totalPro = DB::select(
                'SELECT COUNT(applicants.new_exam_level) AS total_pro
                FROM applicants
                JOIN payments
                ON payments.applicant_id = applicants.id
                WHERE applicants.new_exam_level = ?
                AND payments.paid_date BETWEEN ? AND ?',
                array('Professional', $dateStart, $dateEnd)
            );

            // Total Sub Professional
            $totalSubPro = DB::select(
                'SELECT COUNT(applicants.new_exam_level) AS total_subpro
                FROM applicants
                JOIN payments
                ON payments.applicant_id = applicants.id
                WHERE applicants.new_exam_level = ?
                AND payments.paid_date BETWEEN ? AND ?',
                array('Sub Pro', $dateStart, $dateEnd)
            );

            // Total Approved
            $totalApproved = DB::select(
                'SELECT COUNT(applicants.applicant_status) AS total_approved
                FROM applicants
                JOIN payments
                ON payments.applicant_id = applicants.id
                WHERE applicants.applicant_status = ?
                AND payments.paid_date BETWEEN ? AND ?',
                array(1, $dateStart, $dateEnd)
            );

            // Total Disapproved
            $totalDisapproved = DB::select(
                'SELECT COUNT(applicants.applicant_status) AS total_disapproved
                FROM applicants
                JOIN payments
                ON payments.applicant_id = applicants.id
                WHERE applicants.applicant_status = ?
                AND payments.paid_date BETWEEN ? AND ?',
                array(0, $dateStart, $dateEnd)
            );

            // Total Paid
            $totalPaid = DB::select(
                'SELECT COUNT(applicants.paid_status) AS total_paid
                FROM applicants
                JOIN payments
                ON payments.applicant_id = applicants.id
                WHERE applicants.paid_status = ?
                AND payments.paid_date BETWEEN ? AND ?',
                array(1, $dateStart, $dateEnd)
            );

            // Total Reserved
            $totalReserved = DB::select(
                'SELECT COUNT(applicants.paid_status) AS total_reserved
                FROM applicants
                JOIN payments
                ON payments.applicant_id = applicants.id
                WHERE applicants.paid_status = ?
                AND payments.reserved_date BETWEEN ? AND ?',
                array(0, $dateStart, $dateEnd)
            );

            return Response::json([
                'profit' => $totalProfit,
                'professional' => $totalPro,
                'subpro' => $totalSubPro,
                'approved' => $totalApproved,
                'disapproved' => $totalDisapproved,
                'paid' => $totalPaid,
                'reserved' => $totalReserved,
            ]);
        }
    }

    public function loginPage()
    {
        $title = 'Admin Login Page';
        return View::make('admin.login-page', compact('title'));
    }

    public function verifyLogin()
    {
        $credentials = Auth::attempt([
            'username' => Input::get('username'),
            'password' => Input::get('password')
        ]);

        if (!$credentials) {
            return Response::json([
                'success' => false,
                'message' => 'Invalid user/password input'
            ]);
        }

        return Response::json(['success' => true]);
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
        DB::table('applicants')->where('id', $applicant->id)->update(['applicant_status' => 0]);

        // Delete payments of applicant
        // DB::table('payments')->where('applicant_id', $applicant->id)->delete();


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

        return Redirect::to('admin/paid-applicants')->withMessage(
            $applicant->applicant_first_name . ' ' . $applicant->applicant_last_name .
            ' has been deleted successfully in the database.'
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
                'id',
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

            DB::table('payments')
                ->where('payments.applicant_id', $applicant->id)
                ->update([
                    'transaction_number'    =>  'LBP-' . Str::quickRandom(6),
                    'paid_date'             =>  date('Y-m-d')
                ]);

            $client->account->messages->create(array(
                'To' => $applicant->mobile_number,
                'From' => $_ENV['TWILIO_ACCOUNT_NUMBER'],
                'Body' => $applicant->applicant_first_name . ' ' . $applicant->applicant_last_name .
                    ', you are paid for the examination. From Civil Service Commission'
            ));
        }
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('admin/login');
    }
}