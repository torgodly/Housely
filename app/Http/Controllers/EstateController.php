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
        $utilities = $estate->utilities;
        // Define the desired utility names
        $desiredUtilities = collect(['bedroom', 'bathroom', 'kitchen']);

        // Filter the utilities based on the desired names
        $filteredUtilities = $utilities->filter(function ($utility) use ($desiredUtilities) {
            return $desiredUtilities->contains($utility['name']);
        });
        return view('Estate.show', compact('estate'));
    }

}
