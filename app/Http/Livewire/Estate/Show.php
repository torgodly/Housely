<?php

namespace App\Http\Livewire\Estate;

use Livewire\Component;

class Show extends Component
{
    public $estate;
    public $utilities;

    public function render()
    {
        $this->utilities = $this->estate->utilities;

        return view('livewire.estate.show', [
            'estate' => $this->estate,
            'utilities' => $this->utilities,]);
    }

    public function favorite()
    {
        $this->estate->favoritedBy()->toggle(\Auth::user());
    }

}
