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
    public function show($estate) {

        // Disable global scope
        $estate = Estate::withoutGlobalScopes()->findOrFail($estate);

        // Load relations
        $estate->load([
            'utilities' => function ($query) {
                $query->select('name', 'estate_utility.quantity');
            },
            'images'
        ]);

        // Render view
        return view('estate.show', compact('estate'));

    }



}
