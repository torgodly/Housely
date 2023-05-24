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

    public function store(Request $request)
    {

        dd($request->all());
        // validate the form input fields
//        $validatedData = $request->validate([
//            'name' => 'required|string|max:255',
//            // add other fields here as needed
//        ]);

        // create a new property
        $property = Estate::find(1);

        // sync the utility quantities with the property
        $utilities = collect($request->utilities)->filter(function ($utility) {
            return isset($utility['quantity']) && $utility['quantity'] > 0;
        })->mapWithKeys(function ($utility) {
            return [$utility['id'] => ['quantity' => $utility['quantity']]];
        });
        $property->utilities()->sync($utilities);

        return redirect()->back()->with('success', 'Estate created successfully!');
    }

}
