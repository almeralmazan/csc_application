<?php

class HomeController extends BaseController {

	public function home()
	{
        $title = 'Home';
		return View::make('home.news', compact('title'));
	}

    public function history()
    {
        $title = 'History';
        return View::make('home.history', compact('title'));
    }

    public function missionVision()
    {
        $title = 'Mission & Vision';
        return View::make('home.mission-vision', compact('title'));
    }

    public function requirements()
    {
        $title = 'Requirements';
        return View::make('home.requirements', compact('title'));
    }

    public function smsCode()
    {
        $title = 'SMS Code';
        return View::make('home.sms-code', compact('title'));
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
        return View::make('home.list-of-passers', compact('title'));
    }

    public function getAllPassedApplicants()
    {
        return Applicant::getAllPassedApplicants();
    }

    public function deniedApplicant()
    {
        $title = 'Denied Applicant Page';

        $cities_and_provinces = CityProvince::all();
        $locations = TestingCenter::all();
        $requirements = Requirement::all();

        return View::make('home.denied-applicant',
            compact('title', 'cities_and_provinces', 'locations', 'requirements'));
    }

    public function searchDeniedApplicant($fullName)
    {
        $name = explode(' ', $fullName);
        $firstName = $name[0];
        $lastName = $name[1];

        $applicant = Applicant::where('applicant_first_name', $firstName)
                        ->where('applicant_last_name', $lastName)
                        ->where('applicant_status', 0)
                        ->first();

        // Store applicant id into session

        if ( ! is_null($applicant) )
        {
            Session::put('applicantId', $applicant->id);

            return Response::json([
                'success'   =>  true,
                'applicant' =>  $applicant->toArray()
            ]);
        }

        return Response::json([
            'success'   =>  false
        ]);
    }

    public function updateInfo()
    {
        $validation = Validator::make(Input::all(), Applicant::$rules, Applicant::$messages);

        if ($validation->fails())
        {
            return Redirect::back()->withInput()->withErrors($validation->messages());
        }
        else
        {
            // Applicant Picture File upload
            $applicantPictureImage  = Input::file('applicant_picture');
            $applicantPicFileName   = date('Y-m-d-') . $applicantPictureImage->getClientOriginalName();

            // First Requirement Image
            $firstRequirementImage      = Input::file('first_requirement_image');
            $firstRequirementFileName   = date('Y-m-d-') . $firstRequirementImage->getClientOriginalName();

            // Second Requirement Image
            $secondRequirementImage     = Input::file('second_requirement_image');
            $secondRequirementFileName  = date('Y-m-d-') . $secondRequirementImage->getClientOriginalName();


            $destinationPath        = public_path() . '/img/applicants';
            $applicantPictureImage->move($destinationPath, $applicantPicFileName);
            $firstRequirementImage->move($destinationPath, $firstRequirementFileName);
            $secondRequirementImage->move($destinationPath, $secondRequirementFileName);

            $applicantId = Session::get('applicantId');

            Applicant::where('id', $applicantId)->update([
                'applicant_last_name'           =>  Input::get('applicant_last_name'),
                'applicant_first_name'          =>  Input::get('applicant_first_name'),
                'applicant_middle_name'         =>  Input::get('applicant_middle_name'),
                'applicant_middle_initial'      =>  Input::get('applicant_middle_initial'),
                'applicant_suffix'              =>  Input::get('applicant_suffix'),
                'gender'                        =>  Input::get('gender'),
                'date_of_birth'                 =>  Input::get('date_of_birth'),
                'place_of_birth'                =>  Input::get('place_of_birth'),
                'maiden_last_name'              =>  Input::get('maiden_last_name'),
                'maiden_first_name'             =>  Input::get('maiden_first_name'),
                'maiden_middle_name'            =>  Input::get('maiden_middle_name'),
                'address'                       =>  Input::get('address'),
                'citizenship'                   =>  Input::get('citizenship'),
                'civil_status'                  =>  Input::get('civil_status'),
                'mobile_number'                 =>  Input::get('mobile_number'),
                'phone_number'                  =>  Input::get('phone_number'),
                'email'                         =>  Input::get('email'),
                'csid_no'                       =>  Input::get('csid_no'),
                'new_exam_mode'                 =>  Input::get('new_exam_mode'),
                'new_exam_level'                =>  Input::get('new_exam_level'),
                'testing_centers_location_id'   =>  Input::get('testing_centers_location'),
                'schedule_date_start'           =>  Input::get('schedule_date_start'),
                'schedule_time_start'           =>  Input::get('schedule_time_start'),
                'schedule_time_end'             =>  Input::get('schedule_time_end'),
                'previous_exam_level'           =>  Input::get('previous_exam_level'),
                'previous_date_exam'            =>  Input::get('previous_date_exam'),
                'applicant_picture'             =>  $applicantPicFileName,
                'requirement_type_1'            =>  Input::get('requirement_type_1'),
                'requirement_image_1'           =>  $firstRequirementFileName,
                'requirement_type_2'            =>  Input::get('requirement_type_2'),
                'requirement_image_2'           =>  $secondRequirementFileName
            ]);

        }
    }

    public function payment()
    {
        $title = 'Payment';
        return View::make('home.payment', compact('title'));
    }

    public function getApplicantStatus($controlNumber)
    {
        $result = Applicant::getApplicantStatus($controlNumber);

        if (empty($result))
        {
            return Response::json(['success' => false, 'message' => 'No results']);
        }

        return Response::json(['success' => true, 'message' => $result]);
    }

    // AJAX
    public function allAvailableSchedules($locationId)
    {
        return Applicant::getAllAvailableSchedules($locationId);
    }

    public function validateAllInputs()
    {
        $validation = Validator::make(Input::all(), Applicant::$rules, Applicant::$messages);

        if ($validation->fails())
        {
            return Redirect::back()->withInput()->withErrors($validation->messages());
        }
        else
        {
            $control = Applicant::getNextAutoIncrementValue();

            // Workaround to previous date exam date field if it is empty
            $previousDateExamInputted = Input::get('previous_date_exam');

            if (empty($previousDateExamInputted))
            {
                $previousDateExam = '0000-00-00';
            }
            else
            {
                $previousDateExam = $previousDateExamInputted;
            }

            // Applicant Picture File upload
            $applicantPictureImage  = Input::file('applicant_picture');
            $applicantPicFileName   = date('Y-m-d-') . $applicantPictureImage->getClientOriginalName();

            // First Requirement Image
            $firstRequirementImage      = Input::file('first_requirement_image');
            $firstRequirementFileName   = date('Y-m-d-') . $firstRequirementImage->getClientOriginalName();

            // Second Requirement Image
            $secondRequirementImage     = Input::file('second_requirement_image');
            $secondRequirementFileName  = date('Y-m-d-') . $secondRequirementImage->getClientOriginalName();


            $destinationPath        = public_path() . '/img/applicants';
            $applicantPictureImage->move($destinationPath, $applicantPicFileName);
            $firstRequirementImage->move($destinationPath, $firstRequirementFileName);
            $secondRequirementImage->move($destinationPath, $secondRequirementFileName);


            $applicant = new Applicant;
            $applicant->controlno                 =  $control[0]->number;
            $applicant->applicant_status          =  2;
            $applicant->paid_status               =  0;
            $applicant->exam_status               =  2;
            $applicant->applicant_last_name       =  Input::get('applicant_last_name');
            $applicant->applicant_first_name      =  Input::get('applicant_first_name');
            $applicant->applicant_middle_name     =  Input::get('applicant_middle_name');
            $applicant->applicant_middle_initial  =  Input::get('applicant_middle_initial');
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
            $applicant->applicant_picture         =  $applicantPicFileName;
            $applicant->requirement_type_1        =  Input::get('requirement_type_1');
            $applicant->requirement_image_1       =  $firstRequirementFileName;
            $applicant->requirement_type_2        =  Input::get('requirement_type_2');
            $applicant->requirement_image_2       =  $secondRequirementFileName;
            $applicant->save();
            
            $lastInsertedId = $applicant->id;

            Payment::create([
                'applicant_id'          =>  $lastInsertedId,
                'transaction_number'    =>  '',
                'reserved_date'         =>  \Carbon\Carbon::now(),
                'paid_date'             =>  '0000-00-00',
                'price'                 =>  500.00
            ]);

            return Redirect::action('HomeController@reservedPage', [$lastInsertedId]);
        }
    }

    public function reservedPage($applicantId)
    {
        $title = 'Reserved Page';
        $applicant = Applicant::find($applicantId);
        $payment = Payment::find($applicantId);
        $testingCenter = TestingCenter::find($applicant->testing_centers_location_id);

        return View::make('home.reserved-page', compact('title', 'applicant', 'payment', 'testingCenter'));
    }

}
