<?php

namespace App\Http\Controllers;

use App\Models\Estate;
use App\Models\Utility;
use Illuminate\Http\Request;

class EstateController extends Controller
{
    public function create()
    {
        $utilities = Utility::all();

        return view('Estate.create', compact('utilities'));
    }

//show
    public function show(Estate $estate)
    {
//        dd($estate);
        return view('Estate.show', compact('estate'));
    }

}
