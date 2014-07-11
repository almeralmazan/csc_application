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
}