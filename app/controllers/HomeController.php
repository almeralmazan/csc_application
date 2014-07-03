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

    public function validateAllInputs()
    {
        $rules = [
            'applicant_last_name'               =>  'required',
            'applicant_first_name'              =>  'required',
            'applicant_middle_name'             =>  'required',
            'date_of_birth'                     =>  'required',
            'cities_and_provinces'              =>  'not_in:empty',
            'maiden_last_name'                  =>  'required',
            'maiden_first_name'                 =>  'required',
            'maiden_middle_name'                =>  'required',
            'address'                           =>  'required',
            'mobile_number'                     =>  'required|regex:/^(09)([0-9]{9})$/',
            'email'                             =>  'required|email|unique:applicants',
            'testing_centers_location'          =>  'not_in:empty',
            'picture_photo'                     =>  'image|mimes:jpeg,jpg,png|max:3072',
            'requirement_type_1'                =>  'not_in:empty',
            'first_requirement_image'           =>  'image|mimes:jpeg,jpg,png|max:3072',
            'requirement_type_2'                =>  'not_in:empty',
            'second_requirement_image'          =>  'image|mimes:jpeg,jpg,png|max:3072',
        ];

        $validation = Validator::make(Input::all(), $rules);

        if ($validation->fails()
//            is_null(Input::hasFile('picture_photo')) ||
//            is_null(Input::hasFile('first_requirement_image')) ||
//            is_null(Input::hasFile('second_requirement_image'))
        )
        {
            return Response::json([
                'success' => false,
                'message' => $validation->errors()->toArray()
            ]);
        }
        else
        {
            Applicant::create([
                'applicant_status'          =>  0,
                'paid_status'               =>  0,
                'applicant_last_name'       =>  Input::get('applicant_last_name'),
                'applicant_first_name'      =>  Input::get('applicant_first_name'),
                'applicant_middle_name'     =>  Input::get('applicant_middle_name'),
                'applicant_suffix'          =>  Input::get('applicant_suffix'),
                'gender'                    =>  Input::get('gender'),
                'date_of_birth'             =>  Input::get('date_of_birth'),
                'place_of_birth'            =>  Input::get('place_of_birth'),
                'maiden_last_name'          =>  Input::get('maiden_last_name'),
                'maiden_first_name'         =>  Input::get('maiden_first_name'),
                'maiden_middle_name'        =>  Input::get('maiden_middle_name'),
                'address'                   =>  Input::get('address'),
                'citizenship'               =>  Input::get('citizenship'),
                'civil_status'              =>  Input::get('civil_status'),
                'mobile_number'             =>  '+63' . substr(Input::get('mobile_number'), 1),
                'phone_number'              =>  Input::get('phone_number'),
                'email'                     =>  Input::get('email'),
                'csid_no'                   =>  Input::get('csid_no'),
                'new_exam_mode'             =>  Input::get('new_exam_mode'),
                'new_exam_level'            =>  Input::get('new_exam_level'),
                'testing_centers_location'  =>  Input::get('testing_centers_location'),
                'schedule_date_start'       =>  Input::get('schedule_date_start'),
                'schedule_time_start'       =>  Input::get('schedule_time_start'),
                'schedule_time_end'         =>  Input::get('schedule_time_end'),
                'previous_exam_level'       =>  Input::get('previous_exam_level'),
                'previous_date_exam_taken'  =>  Input::get('previous_date_exam_taken'),
                'applicant_picture'         =>  Input::file('applicant_picture'),
                'requirement_type_1'        =>  Input::get('requirement_type_1'),
                'requirement_image_1'       =>  Input::file('requirement_image_1'),
                'requirement_type_2'        =>  Input::get('requirement_type_2'),
                'requirement_image_2'       =>  Input::file('requirement_image_2'),
            ]);

            return Response::json([
                'success' => true,
                'message' => 'Successfully registered!'
            ]);
        }
    }

    public function successPage()
    {
        $title = 'Success Page';
        return View::make('home.success-page', compact('title'));
    }
}
