<?php

namespace App\Http\Livewire\Estate;

use App\Models\Utility;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $step = 1;

    public $type;
    public $address;
    public $city;
    public $country;
    public $land_area;
    public $building_area;
    public $price;
    public $status;
    public $longitude;
    public $latitude;
    public $utilities = [];
    public $images = [];

    public function render()
    {
        $allUtilities = Utility::all();

        return view('livewire.estate.create', compact('allUtilities'));
    }
    public function updateCoordinates($longitude, $latitude)
    {
        $this->longitude = $longitude;
        $this->latitude = $latitude;
    }


    public function nextStep()
    {
        if ($this->step == 1) {
            $this->validate([
                'type' => 'required',
                'address' => 'required',
                'city' => 'required',
                'country' => 'required',
                'land_area' => 'required',
                'building_area' => 'required',
                'price' => 'required',
            ]);
        }
        if ($this->step == 2) {
            $this->validate([
                'utilities' => 'required',

                'utilities.*.quantity' => 'required|numeric|min:1',
            ]);
        }
        if ($this->step == 3) {
            $this->validate([
                'longitude' => 'required',
                'latitude' => 'required',
            ]);
        }
        if ($this->step == 4) {
            $this->validate([
                'images.*' => 'required|image|max:1024', // 1MB Max
            ]);
        }
        $this->step++;

    }

    public function previousStep()
    {
        $this->step--;
    }


    public function submit()
    {
        // Add your code to save the estate here

        $this->reset(); // Resets all the component's properties
    }

}
