<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
  public function home(){
    return view('pages.home');
  }

  //test
  public function login(){
    return view('authentication.login');
  }
  public function register(){
    return view('authentication.registration');
  }
}
