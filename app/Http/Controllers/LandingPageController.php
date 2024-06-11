<?php

namespace App\Http\Controllers;

use App\Models\Gelato;
use App\Models\Minuman;

class LandingPageController extends Controller
{
    public function index()
    {
        $gelato = Gelato::all();
        $minuman = Minuman::all();
        return view('content.landingpage', compact('gelato', 'minuman'));
    }
}
