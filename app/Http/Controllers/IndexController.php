<?php

namespace App\Http\Controllers;

use App\Models\Gelato;
use App\Models\Minuman;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $gelato = Gelato::all();
        $minuman = Minuman::all();
        return view('content.index', compact('gelato', 'minuman'));
    }
}
