<?php

class AdminController extends BaseController {

    public function index()
    {
        $title = 'View Application Page';
        return View::make('admin.view-application', compact('title'));
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
        return View::make('admin.reports', compact('title'));
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
        return DB::table('applicants')
                ->where('exam_status', 1)
                ->select(
                    'id',
                    'controlno',
                    'applicant_last_name',
                    'applicant_first_name',
                    'schedule_date_start',
                    'new_exam_level'
                )->get();
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
            'name'                  =>  'required',
            'username'              =>  'required',
            'role'                  =>  'required|in:admin,processor',
            'password'              =>  'required|confirmed',
            'password_confirmation' =>  'required'
        ];

        $validation = Validator::make(Input::all(), $rules);

        if ($validation->fails())
        {
            return Redirect::back()->withInput()->withErrors($validation->messages());
        }
        else
        {
            User::create([
                'name'      =>  Input::get('name'),
                'username'  =>  Input::get('username'),
                'role'      =>  Input::get('role'),
                'password'  =>  Hash::make(Input::get('password'))
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
            'admin_add_testing_centers' =>  'not_in:empty',
            'admin_add_date_start'      =>  'required',
            'admin_add_time_start'      =>  'required',
            'admin_add_time_end'        =>  'required',
        ];

        $messages = [
            'admin_add_testing_centers.not_in'  =>  'Location is required *',
            'admin_add_date_start.required'     =>  'Required *',
            'admin_add_time_start.required'     =>  'Required *',
            'admin_add_time_end.required'       =>  'Required *',
        ];

        $validation = Validator::make(Input::all(), $rules, $messages);

        if ($validation->fails())
        {
            return Redirect::back()->withInput()->withErrors($validation->messages());
        }
        else
        {
            Schedule::create([
                'testing_center_id' =>  Input::get('admin_add_testing_centers'),
                'date_start'        =>  Input::get('admin_add_date_start'),
                'time_start'        =>  Input::get('admin_add_time_start'),
                'time_end'          =>  Input::get('admin_add_time_end')
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
        return Redirect::to('admin/login');
    }
}