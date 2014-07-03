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
        return View::make('admin.schedules', compact('title'));
    }

    public function users()
    {
        $title = 'Users Page';
        return View::make('admin.users', compact('title'));
    }

    public function reports()
    {
        $title = 'Reports Page';
        return View::make('admin.reports', compact('title'));
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