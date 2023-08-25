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
    public $title;
    public $discount;
    public $commission;
    public $company;
    public $floors;
    public $bedrooms;
    public $bathrooms;
    public $description;
    public $utilities = [];
    public $images = [];
    public $search;


    public function render()
    {
        $allUtilities = Utility::query()->search(['name'], $this->search)->paginate(10);

        return view('livewire.estate.create', compact('allUtilities'));
    }

    public function updateCoordinates($longitude, $latitude)
    {
        $this->longitude = $longitude;
        $this->latitude = $latitude;
    }


    public function nextStep()
    {
        switch ($this->step) {
            case 1:
                $this->validate([
                    'title' => 'required',
                    'type' => 'required',
                    'address' => 'required',
                    'city' => 'required',
                    'country' => 'required',
                    'company' => 'required',
                ]);
                break;
            case 2:
                $this->validate([
                    'land_area' => 'required',
                    'building_area' => 'required',
                ]);
                break;
            case 3:
                $this->validate([
                    'longitude' => 'required',
                    'latitude' => 'required'
                ]);
                break;
            case 4:
                $this->validate([
                    'price' => 'required',
                    'discount' => 'nullable',
                    'commission' => 'nullable',
                ]);
                break;
            case 5:
                $this->validate([
                    'floors' => 'nullable',
                    'bedrooms' => 'nullable',
                    'bathrooms' => 'nullable',
                ]);
                break;
            case 6:
                $this->validate([
                    'description' => 'nullable',
                ]);
                break;
            case 7:
                $this->validate([
                    'utilities' => 'nullable',
                ]);
                break;
            case 8:
                $this->validate([
                    'images' => 'required',
                    'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                ]);
                break;

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
            'code' => uniqid('estate-', false),
            'title' => $this->title,
            'company' => $this->company,
            'type' => $this->type,
            'floors' => $this->floors,
            'commission' => $this->commission,
            'discount' => $this->discount,
            'address' => $this->address,
            'city' => $this->city,
            'country' => $this->country,
            'land_area' => $this->land_area,
            'building_area' => $this->building_area,
            'price' => $this->price,
            'long' => $this->longitude,
            'lat' => $this->latitude,
            'description' => $this->description,
            'bedrooms' => $this->bedrooms,
            'bathrooms' => $this->bathrooms,
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

    public function setDescription($value)
    {
        $this->description = $value;
    }

}
