<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Multiple;

class PortfolioController extends Controller
{
    public function portfolio(){
        $multiimg = Multiple::all();
        return view('layouts.frontend.pages.portfolio',compact('multiimg'));
    }
}
