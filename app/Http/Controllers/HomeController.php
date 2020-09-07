<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{

    public function index()
    {
        return view('home');
    }

    public function dany_cerebral()
    {
        return view('dany_cerebral');
    }

    public function qui_som()
    {
        return view('qui_som');
    }

    public function equip()
    {
        return view('equip');
    }

    public function login()
    {
        return view('login');
    }

    public function contacte()
    {
        return view('contact');
    }

    public function transparencia()
    {
        return view('transparencia');
    }

    public function recursos()
    {
        return view('recursos');
    }

    public function collaboradors()
    {
        return view('collaboradors');
    }

    public function filosofia()
    {
        return view('filosofia');
    }

    public function collabora()
    {
        return view('collabora');
    }
}
