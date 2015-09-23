<?php namespace App\Http\Controllers;

class UsersController extends Controller {

    /**
     * Initializer.
     *
     * @return \UsersController
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('users');
    }

}