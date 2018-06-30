<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){

        //return main landing page

        return view('pages.index');

    }

    public function slider(){

        return view('pages.slider');
    }

    public function dashboard(){

        return view('dashboard');
    }
}
