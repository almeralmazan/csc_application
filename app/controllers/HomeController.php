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
        return View::make('home.list_of_passers', compact('title'));
    }

    public function getAllPassedApplicants()
    {
        return Applicant::getAllPassedApplicants();
    }

    public function paymentStatus()
    {
        $title = 'Payment Status';
        return View::make('home.payment-status', compact('title'));
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
                'applicant_id'  =>  $lastInsertedId,
                'paid_date'     =>  '0000-00-00',
                'price'         =>  500.00
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

    public function proceedToPayment()
    {
        $title = 'Proceed To Payment Page';
        return View::make('home.proceed-to-payment', compact('title'));
    }
}
