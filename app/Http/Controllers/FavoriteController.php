<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    //index
    public function index()
    {
        $estates = \Auth::user()->favorites;
        return view('favorite.index',
            ['estates' => $estates]
        );
    }

}
