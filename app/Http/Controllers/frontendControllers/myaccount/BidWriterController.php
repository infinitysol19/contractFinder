<?php

namespace App\Http\Controllers\frontendControllers\myaccount;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BidWriterController extends Controller
{
    public function index(){


        return view('frontend.myaccount.index')->with('template','bidwriter');
    }
}
