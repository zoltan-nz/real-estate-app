<?php

class AdminController extends \BaseController {


    protected $layout = 'layouts.admin';


    public function index()
    {
        if (Auth::check())
        {
            $this->layout->content = View::make('admin');
        }
        else
        {
            return Redirect::to('user/login')
                ->with('message', 'For Admin, please log in.');
        }

    }
}