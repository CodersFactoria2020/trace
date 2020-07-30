<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
