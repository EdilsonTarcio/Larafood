<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlanContoller extends Controller
{
    public function index (){
        //dd('PlanContoller@index');
        return view('admin.pages.plans.index');
    }
}
