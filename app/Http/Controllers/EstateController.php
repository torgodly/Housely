<?php

namespace App\Http\Controllers;

use App\Models\Estate;
use App\Models\Utility;
use Hamcrest\Util;
use Illuminate\Http\Request;

class EstateController extends Controller
{
    public function index()
    {

        return view('estate.table');
    }

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

    //destroy
    public function destroy(Request $request, $estate)
    {
        $request->validateWithBag('estateDeletion', [
            'password' => ['required', 'current_password'],
        ]);
        $estate = Estate::withoutGlobalScopes()->find($estate);
        $estate->delete();
        session()->flash('Message', 'Estate deleted successfully');
        return redirect()->route('estates.index');
    }

    //store
    public function store(Request $request)
    {

        dd($request->all());
        $request->validate([
            'code' => 'required|unique:estates',
            'title' => 'required',
            'type' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'land_area' => 'required',
            'building_area' => 'required',
            'long' => 'required',
            'lat' => 'required',
            'price' => 'required',
            'discount' => 'nullable',
            'commission' => 'nullable',
            'floors' => 'nullable',
            'bedrooms' => 'nullable',
            'bathrooms' => 'nullable',
            'description' => 'nullable',
            'available' => 'nullable',
            'sold_at' => 'nullable',
            'company' => 'required',
            'utilities' => 'nullable',
            'images' => 'nullable',
        ]);

        $estate = Estate::create([
            'code' => $request->code,
            'title' => $request->title,
            'type' => $request->type,
            'address' => $request->address,
            'city' => $request->city,
            'country' => $request->country,
            'land_area' => $request->land_area,
            'building_area' => $request->building_area,
            'long' => $request->long,
            'lat' => $request->lat,
            'price' => $request->price,
            'discount' => $request->discount,
            'commission' => $request->commission,
            'floors' => $request->floors,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'description' => $request->description,
            'available' => $request->available,
            'sold_at' => $request->sold_at,
            'company' => $request->company,
        ]);

        $estate->utilities()->attach($request->utilities);

        $estate->images()->createMany($request->images);

        session()->flash('Message', 'Estate created successfully');
        return redirect()->route('estates.index');
    }

}
