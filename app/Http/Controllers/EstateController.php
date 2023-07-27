<?php

namespace App\Http\Controllers;

use App\Models\Estate;
use App\Models\Utility;
use Hamcrest\Util;
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
        $estate->load(['utilities' => function ($query) {
            $query->select('name', 'estate_utility.quantity');
        }, 'images']);

        return view('estate.show', compact('estate'));
    }



}
