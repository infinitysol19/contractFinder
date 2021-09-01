<?php

namespace App\Http\Controllers\frontendControllers\BuyerBehaviour;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BuyerBehaviourController extends Controller
{
    //
      public function index()
    {

        // return "hello from live search controller";
        return view('frontend.buyer_behaviour.buyer_behaviour');
    }
}
