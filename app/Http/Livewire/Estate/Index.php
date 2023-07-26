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
    public $MaxPrice = null;
    public $MinArea = null;
    public $MaxArea = null;
    public $BedRooms = null;
    public $BathRooms = null;
    public $Floors = null;
    public $Type = null;
    public $Utilities;
    public $ResultsCount;
    protected $FilteredEstates = null;
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

    public function mount()
    {

        //check if any of the query string is not null
        if ($this->MinPrice != null || $this->MaxPrice != null || $this->MinArea != null || $this->MaxArea != null || $this->BedRooms != null || $this->BathRooms != null || $this->Floors != null || $this->Type != null || $this->SelectedUtilities != null) {
            $this->ResultsCount = Estate::with('images')
                ->wherePrice($this->MinPrice, $this->MaxPrice)
                ->whereArea($this->MinArea, $this->MaxArea)
                ->whereBedroom($this->BedRooms)
                ->whereBathroom($this->BathRooms)
                ->whereFloors($this->Floors)
                ->whereNoCommission(null)
                ->whereDiscount(null)
                ->whereCity(null)
                ->whereCountry(null)
                ->whereType($this->Type)
                ->whereUtilities($this->SelectedUtilities)
                ->count();
            $this->applyFilters();
        }


    }

    public function render()
    {

        if ($this->hasFilters()) {
            $this->applyFilters();
            $this->estates = $this->FilteredEstates;
        } else {
            $this->estates = Estate::with('images')->paginate($this->perPage);
        }
        $this->Utilities = Utility::all();
        return view('livewire.estate.index', [
            'estates' => $this->estates
        ]);
    }

    //set bed rooms
    public function setBedRooms($value)
    {

        $this->BedRooms = $value;
    }


    public function resetFilter()
    {
        $this->reset('MinArea', 'MaxArea', 'MinPrice', 'MaxPrice', 'Type', 'Floors', 'BathRooms', 'BedRooms', 'SelectedUtilities');
    }

    //when any of the filter properties change  get the result count
    public function updated($propertyName)
    {
//        dd($propertyName);
        $this->ResultsCount = Estate::query()
            ->wherePrice($this->MinPrice, $this->MaxPrice)
            ->whereArea($this->MinArea, $this->MaxArea)
            ->whereBedroom($this->BedRooms)
            ->whereBathroom($this->BathRooms)
            ->whereFloors($this->Floors)
            ->whereNoCommission(null)
            ->whereDiscount(null)
            ->whereCity(null)
            ->whereCountry(null)
            ->whereType($this->Type)
            ->whereUtilities($this->SelectedUtilities)
            ->count();

    }

    public function applyFilters()
    {

        $this->FilteredEstates = Estate::with('images')
            ->wherePrice($this->MinPrice, $this->MaxPrice)
            ->whereArea($this->MinArea, $this->MaxArea)
            ->whereBedroom($this->BedRooms)
            ->whereBathroom($this->BathRooms)
            ->whereFloors($this->Floors)
            ->whereNoCommission(null)
            ->whereDiscount(null)
            ->whereCity(null)
            ->whereCountry(null)
            ->whereType($this->Type)
            ->whereUtilities($this->SelectedUtilities)
            ->get();

    }

// fucntiom to check if amy of the filters is not null
    public function hasFilters()
    {
        return $this->MinPrice != null || $this->MaxPrice != null || $this->MinArea != null || $this->MaxArea != null || $this->BedRooms != null || $this->BathRooms != null || $this->Floors != null || $this->Type != null || $this->SelectedUtilities != [];
    }

}
