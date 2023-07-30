<?php

namespace App\Http\Livewire\Estate;

use App\Models\Estate;
use App\Models\Utility;
use Livewire\Component;

class Index extends Component
{
    // Properties for filtering and pagination
    public $perPage = 12;
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
    public $SelectedUtilities = [];
    protected $estates;

    // Livewire listeners and query string bindings
    protected $listeners = [
        'load-more' => 'loadMore'
    ];
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

    // Load more estates when the "load-more" event is triggered
    public function loadMore()
    {
        $this->perPage += 12;
    }

    // Initialize component with initial filters


    // Render the Livewire component
    public function render()
    {
//        var_dump($this->hasFilters());
        if ($this->hasFilters()) {
            // Apply filters and get the filtered estates
            $this->applyFilters();
            $this->estates = $this->FilteredEstates;

        } else {
            // If no filters, fetch random estates
            $this->estates = Estate::with('images')->paginate($this->perPage);
        }

        // Fetch all available utilities
        $this->Utilities = \DB::table('utilities')->get();

        // Render the Livewire component with the estates data
        return view('livewire.estate.index', [
            'estates' => $this->estates,
            'utilities' => $this->Utilities
        ]);
    }

    // Set bed rooms filter
    public function setBedRooms($value)
    {
        $this->BedRooms = $value;
    }

    // Reset all filters
    public function resetFilter()
    {
        $this->reset('MinArea', 'MaxArea', 'MinPrice', 'MaxPrice', 'Type', 'Floors', 'BathRooms', 'BedRooms', 'SelectedUtilities');
    }

    // When any of the filter properties change, update the results count
    public function updated()
    {
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

    // Apply filters and fetch the filtered estates
    public function applyFilters()
    {
        $this->FilteredEstates = Estate::query()
            ->with('images')
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

    // Check if any of the filters is not null
    public function hasFilters()
    {
        return !empty($this->MinPrice) || !empty($this->MaxPrice) || !empty($this->MinArea) || !empty($this->MaxArea)
            || !empty($this->BedRooms) || !empty($this->BathRooms) || !empty($this->Floors) || !empty($this->Type)
            || !empty($this->SelectedUtilities);
    }
}
