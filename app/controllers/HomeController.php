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
            'picture_photo.image'               =>  'Accept only jpeg, jpg, png images',
            'requirement_type_1.not_in'         =>  'Select a type *',
            'first_requirement_image.image'     =>  'Required *',
            'requirement_type_2.not_in'         =>  'Select a type *',
            'second_requirement_image.image'    =>  'Required *',
        ];

        $validation = Validator::make(Input::all(), Applicant::$rules, $messages);

        if ($validation->fails())
        {
            return Redirect::back()->withInput()->withErrors($validation->messages());
        }
        else
        {
            // Workaround for auto incrementing value for control number
            // with leading zeros
            $control = DB::select('SELECT AUTO_INCREMENT as number
                                        FROM INFORMATION_SCHEMA.TABLES
                                        WHERE TABLE_SCHEMA = ?
                                        AND TABLE_NAME = ?', ['csc_application_db', 'applicants']);


            // Workaround to previous date exam date field if it is empty
            $previousDateExamInputted = Input::get('previous_date_exam');
            $previousDateExam = '';

            if (empty($previousDateExamInputted))
            {
                $previousDateExam = '0000-00-00';
            }

            $applicant = new Applicant;
            $applicant->controlno                 =  $control[0]->number;
            $applicant->applicant_last_name       =  Input::get('applicant_last_name');
            $applicant->applicant_first_name      =  Input::get('applicant_first_name');
            $applicant->applicant_middle_name     =  Input::get('applicant_middle_name');
            $applicant->applicant_suffix          =  Input::get('applicant_suffix');
            $applicant->gender                    =  Input::get('gender');
            $applicant->date_of_birth             =  Input::get('date_of_birth');
            $applicant->place_of_birth            =  Input::get('place_of_birth');
            $applicant->maiden_last_name          =  Input::get('maiden_last_name');
            $applicant->maiden_first_name         =  Input::get('maiden_first_name');
            $applicant->maiden_middle_name        =  Input::get('maiden_middle_name');
            $applicant->address                   =  Input::get('address');
            $applicant->citizenship               =  Input::get('citizenship');
            $applicant->civil_status              =  Input::get('civil_status');
            $applicant->mobile_number             =  '+63' . substr(Input::get('mobile_number'), 1);
            $applicant->phone_number              =  Input::get('phone_number');
            $applicant->email                     =  Input::get('email');
            $applicant->csid_no                   =  Input::get('csid_no');
            $applicant->new_exam_mode             =  Input::get('new_exam_mode');
            $applicant->new_exam_level            =  Input::get('new_exam_level');
            $applicant->testing_centers_location_id  =  Input::get('testing_centers_location');
            $applicant->schedule_date_start       =  Input::get('schedule_date_start');
            $applicant->schedule_time_start       =  Input::get('schedule_time_start');
            $applicant->schedule_time_end         =  Input::get('schedule_time_end');
            $applicant->previous_exam_level       =  Input::get('previous_exam_level');
            $applicant->previous_date_exam        =  $previousDateExam;
            $applicant->applicant_picture         =  Input::file('applicant_picture');
            $applicant->requirement_type_1        =  Input::get('requirement_type_1');
            $applicant->requirement_image_1       =  Input::file('first_requirement_image');
            $applicant->requirement_type_2        =  Input::get('requirement_type_2');
            $applicant->requirement_image_2       =  Input::file('second_requirement_image');

            $applicant->save();
            
            $lastInsertedId = $applicant->id;

            return Redirect::action('HomeController@reservedPage', [$lastInsertedId]);
        }
    }

    public function reservedPage($applicantId)
    {
        $title = 'Reserved Page';
        $applicant = Applicant::find($applicantId);
        $testingCenter = TestingCenter::find($applicant->testing_centers_location_id);

        return View::make('home.reserved-page', compact('title', 'applicant', 'testingCenter'));
    }

    public function proceedToPayment()
    {
        $title = 'Proceed To Payment Page';
        return View::make('home.proceed-to-payment', compact('title'));
    }
}
