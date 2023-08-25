<?php

namespace App\Http\Controllers;

use App\Models\Utility;
use Illuminate\Http\Request;

class UtilityController extends Controller
{
//    index
    public function index()
    {
        return view('utilities.index');
    }

    //store
    public function store(Request $request)
    {
        Utility::create($request->all());
        session()->flash('Message', __('Utility created successfully'));
        return redirect()->route('utilities.index');
    }
    //destroy
    public function destroy(Request $request, $utility)
    {
        $utility = Utility::withoutGlobalScopes()->find($utility);
        $utility->delete();
        session()->flash('Message', __('Utility deleted successfully'));
        return redirect()->route('utilities.index');
    }

    //update
    public function update(Request $request, $utility)
    {
        $utility = Utility::withoutGlobalScopes()->find($utility);
        $utility->update($request->all());
        session()->flash('Message', __('Utility updated successfully'));
        return redirect()->route('utilities.index');
    }
}
