<?php

namespace App\Http\Livewire\Estate;

use Livewire\Component;

class Show extends Component
{
    public $estate;
    public $utilities;
    public $ShowLogin = false;

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
            $this->ShowLogin = true;
            return;
        }
        $this->estate->favoritedBy()->toggle(\Auth::user());
    }

    //order estate and
    public function order()
    {

        if (!\Auth::check()) {
            $this->ShowLogin = true;
            return;
        }
        $order = \Auth::user()->orders()->create([
            'code' => uniqid('order-', false),
            'phone_number' => \Auth::user()->phone_number,
            'estate_id' => $this->estate->id,

        ]);
        session()->flash('Message', __('Order created successfully.'));
    }

    //cancel order
    public function cancelOrder()
    {
        \Auth::user()->orders()->where('estate_id', $this->estate->id)->delete();
        session()->flash('Message', __('Order canceled successfully.'));
    }

    //sold
    public function sold()
    {

        //update available to the opposite
        if ($this->estate->available) {
            $this->estate->update([
                'available' => false,
                'sold_at' => now()

            ]);
        } else {
            $this->estate->update([
                'available' => true,
                'sold_at' => null

            ]);
        }
    }

}
