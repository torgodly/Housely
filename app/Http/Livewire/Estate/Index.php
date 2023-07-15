<?php

namespace App\Http\Livewire\Estate;

use App\Models\Estate;
use App\Models\Utility;
use Livewire\Component;

class Index extends Component
{
    public $perPage = 12;
    protected $estates;
    public $MinPrice = null;
    public $MaxPrice= null;
    public $MinArea =null;
    public $MaxArea = null;
    public $BedRooms = null;
    public $BathRooms = null;
    public $Floors = null;
    public $Type = null;
    public $Utilities;
    public $SelectedUtilities = [];
    protected $listeners = [
        'load-more' => 'loadMore'
    ];
//add all qery string to url
    protected $queryString = [
        'MinPrice' => ['except' => ''],
        'MaxPrice' => ['except' => ''],
        'MaxArea' => ['except' => ''],
        'MinArea' => ['except' => ''],
        'BedRooms' => ['except' => ''],
        'BathRooms' => ['except' => ''],
        'Floors' => ['except' => ''],
        'Type' => ['except' => ''],
        'SelectedUtilities' => ['except' => []],
    ];

    public function loadMore()
    {
        $this->perPage = $this->perPage + 12;
    }

    public function render()
    {
        $this->Utilities = Utility::all();
        $this->estates = Estate::with('images')->wherePrice($this->MinPrice, $this->MaxPrice)->whereArea($this->MinArea, $this->MaxArea)->get();
//        dd($this->estates);
        return view('livewire.estate.index', [
            'estates' => $this->estates
        ]);
    }

    //set bed rooms
    public function setBedRooms($value)
    {
        $this->BedRooms = $value;
    }

    //set bathrooms
    public function setBathRooms($value)
    {
        $this->BathRooms = $value;
    }

    //floots

    public function setFloors($value)
    {
        $this->Floors = $value;
    }

    public function setType($value)
    {
        $this->Type = $value;
    }

    public function resetFilter()
    {
        $this->reset('MinArea','MaxArea','MinPrice','MaxPrice','Type','Floors','BathRooms','BedRooms','SelectedUtilities');
    }


}
