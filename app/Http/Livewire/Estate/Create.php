<?php

namespace App\Http\Livewire\Estate;

use App\Models\Estate;
use App\Models\Utility;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $step = 1;

    public $type = '';
    public $city = '';
    public $country = '';
    public $address;
    public $land_area;
    public $building_area;
    public $price;
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

//        dd($this->price);
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

        //step cant be less than 1
        if ($this->step >= 2) {
            $this->step--;
        }


    }


    public function submit()
    {
        // Add your code to save the estate here
        $estate = Estate::create([
            'type' => $this->type,
            'address' => $this->address,
            'city' => $this->city,
            'country' => $this->country,
            'land_area' => $this->land_area,
            'building_area' => $this->building_area,
            'price' => $this->price,
            'long' => $this->longitude,
            'lat' => $this->latitude,
        ]);
        //save utilities
        $estate->utilities()->attach($this->utilities);
        //save images
        foreach ($this->images as $image) {
            $image->store('public/estates');
            $estate->images()->create([
                'path' => $image->hashName(),
            ]);
        }
        session()->flash('Success', __('Estate successfully created.'));

        $this->reset(); // Resets all the component's properties
    }

    public function toggleUtility($utilityId)
    {
        if (isset($this->utilities[$utilityId])) {
            unset($this->utilities[$utilityId]);
        } else {
            $this->utilities[$utilityId] = ['quantity' => 1];
        }
    }

}
