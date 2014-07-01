<?php

class AdminController extends BaseController {

    public function loginPage()
    {
        $title = 'Admin Login Page';
        return View::make('admin.login-page', compact('title'));
    }
}