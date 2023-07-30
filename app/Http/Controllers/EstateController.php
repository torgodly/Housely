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


}
