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
        return View::make('home.application_form', compact('title'));
    }

    public function listOfPassers()
    {
        $title = 'List Of Passers';
        return View::make('home.list_of_passers', compact('title'));
    }

    public function payment()
    {
        $title = 'Payment';
        return View::make('home.payment', compact('title'));
    }
}
