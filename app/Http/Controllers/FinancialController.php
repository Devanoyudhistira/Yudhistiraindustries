<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class FinancialController extends Controller
{
    public function financial(){
        return View("Financial") ;
    }
}
