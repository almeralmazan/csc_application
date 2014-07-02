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
            'current_demographic_data_address'  =>  'required',
            'mobile_number'                     =>  'required|regex:/^(09)([0-9]{9})$/',
            'email'                             =>  'required|email|unique:applicants',
            'testing_centers_location'          =>  'not_in:empty',
            'picture_photo'                     =>  'required',
            'requirement_type_1'                =>  'not_in:empty',
            'first_requirement_image'           =>  'required',
            'requirement_type_2'                =>  'not_in:empty',
            'second_requirement_image'          =>  'required',
        ];

        $validation = Validator::make(Input::all(), $rules);

        if ($validation->fails())
        {
            return Response::json([
                'success' => false,
                'message' => $validation->errors()->toArray()
            ]);
        }
        else
        {
//            User::create([
//                'first_name'    =>  Input::get('first_name'),
//                'last_name'     =>  Input::get('last_name'),
//                'mobile_number' =>  '+63' . substr(Input::get('mobile_number'), 1),
//                'email'         =>  Input::get('email'),
//                'password'      =>  Hash::make(Input::get('password')),
//                'admin'         =>  0
//            ]);

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
