<?php

namespace App\Http\Livewire\Estate;

use Livewire\Component;

class Show extends Component
{
    public $estate;
    public $utilities;
    public $ShowLogin=false;

    public function render()
    {
        $this->utilities = $this->estate->utilities;

        return view('livewire.estate.show', [
            'estate' => $this->estate,
            'utilities' => $this->utilities,]);
    }

    public function favorite()
    {
        if (!\Auth::check()) {
            $this->ShowLogin=true;
            return;
        }
        $this->estate->favoritedBy()->toggle(\Auth::user());
    }

    //order estate and
    public function order()
    {

        if (!\Auth::check()) {
            $this->ShowLogin=true;
            return;
        }
        $order = $this->estate->orders()->create([
            'code' => uniqid('order-', false),
//            'phone_number' => \Auth::user()->phone_number,
            'phone_number' => '0920000000',

        ]);

    }


}
