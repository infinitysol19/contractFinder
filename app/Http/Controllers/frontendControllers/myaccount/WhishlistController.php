<?php

namespace App\Http\Controllers\frontendControllers\myaccount;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WhishlistController extends Controller
{
    public function index(){


        return view('frontend.myaccount.index')->with('template','whistlist');
    }


public function recentallyview(){


        return view('frontend.myaccount.index')->with('template','whistlist');
    }


}
