<?php

namespace App\Http\Controllers\frontendControllers\Competitors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompetitorsController extends Controller
{
    //
      public function index()
    {

        // return "hello from live search controller";
        return view('frontend.competitors.competitors');
    }
}
