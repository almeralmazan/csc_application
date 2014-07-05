<?php

class HomeController extends BaseController {

	public function home()
	{
        $title = 'Home';
		return View::make('home.index', compact('title'));
	}

    public function applicationForm()
    {
        $title = 'Application Form';
        $cities_and_provinces = CityProvince::all();
        $locations = TestingCenter::all();
        $requirements = Requirement::all();
        return View::make('home.application_form',
            compact('title', 'cities_and_provinces', 'locations', 'requirements'));
    }

    public function listOfPassers()
    {
        $title = 'List Of Passers';
        $applicants = Applicant::all();
        return View::make('home.list_of_passers', compact('title', 'applicants'));
    }

    public function payment()
    {
        $title = 'Payment';
        return View::make('home.payment', compact('title'));
    }

    public function getAllAvailableSchedules($locationId)
    {
        $result = DB::table('schedules')
                    ->join('testing_centers', 'schedules.testing_center_id', '=', 'testing_centers.id')
                    ->where('testing_centers.id', $locationId)
                    ->select(
                        'testing_centers.location',
                        'schedules.id',
                        'schedules.date_start',
                        'schedules.time_start',
                        'schedules.time_end'
                    )
                    ->get();

        return $result;
    }

    public function validateAllInputs()
    {

        $messages = [
            'applicant_last_name.required'      =>  'Last name is required',
            'applicant_first_name.required'     =>  'First name is required',
            'applicant_middle_name.required'    =>  'Middle name is required',
            'date_of_birth.required'            =>  'Date of birth is required',
            'place_of_birth.not_in'             =>  'You must select your place of birth',
            'maiden_last_name.required'         =>  'Required *',
            'maiden_first_name.required'        =>  'Required *',
            'maiden_middle_name.required'       =>  'Required *',
            'testing_centers_location.not_in'   =>  'Choose Testing Center location',
            'schedule_date_start.required'      =>  'Required *',
            'schedule_time_start.required'      =>  'Required *',
            'schedule_time_end.required'        =>  'Required *',
        ];

        $validation = Validator::make(Input::all(), Applicant::$rules, $messages);

        if ($validation->fails())
//            is_null(Input::hasFile('picture_photo')) ||
//            is_null(Input::hasFile('first_requirement_image')) ||
//            is_null(Input::hasFile('second_requirement_image'))
        {
            return Redirect::back()->withInput()->withErrors($validation->messages());
        }
        else
        {
//            Applicant::create([
//                'applicant_status'          =>  0,
//                'paid_status'               =>  0,
//                'applicant_last_name'       =>  Input::get('applicant_last_name'),
//                'applicant_first_name'      =>  Input::get('applicant_first_name'),
//                'applicant_middle_name'     =>  Input::get('applicant_middle_name'),
//                'applicant_suffix'          =>  Input::get('applicant_suffix'),
//                'gender'                    =>  Input::get('gender'),
//                'date_of_birth'             =>  Input::get('date_of_birth'),
//                'place_of_birth'            =>  Input::get('place_of_birth'),
//                'maiden_last_name'          =>  Input::get('maiden_last_name'),
//                'maiden_first_name'         =>  Input::get('maiden_first_name'),
//                'maiden_middle_name'        =>  Input::get('maiden_middle_name'),
//                'address'                   =>  Input::get('address'),
//                'citizenship'               =>  Input::get('citizenship'),
//                'civil_status'              =>  Input::get('civil_status'),
//                'mobile_number'             =>  '+63' . substr(Input::get('mobile_number'), 1),
//                'phone_number'              =>  Input::get('phone_number'),
//                'email'                     =>  Input::get('email'),
//                'csid_no'                   =>  Input::get('csid_no'),
//                'new_exam_mode'             =>  Input::get('new_exam_mode'),
//                'new_exam_level'            =>  Input::get('new_exam_level'),
//                'testing_centers_location'  =>  Input::get('testing_centers_location'),
//                'schedule_date_start'       =>  Input::get('schedule_date_start'),
//                'schedule_time_start'       =>  Input::get('schedule_time_start'),
//                'schedule_time_end'         =>  Input::get('schedule_time_end'),
//                'previous_exam_level'       =>  Input::get('previous_exam_level'),
//                'previous_date_exam_taken'  =>  Input::get('previous_date_exam_taken'),
//                'applicant_picture'         =>  Input::file('applicant_picture'),
//                'requirement_type_1'        =>  Input::get('requirement_type_1'),
//                'requirement_image_1'       =>  Input::file('requirement_image_1'),
//                'requirement_type_2'        =>  Input::get('requirement_type_2'),
//                'requirement_image_2'       =>  Input::file('requirement_image_2'),
//            ]);

//            return Response::json([
//                'success' => true,
//                'message' => 'Successfully registered!'
//            ]);
            return 'Yahoo';
        }
    }

    public function reservedPage()
    {
        $title = 'Reserved Page';
        return View::make('home.reserved-page', compact('title'));
    }
}
