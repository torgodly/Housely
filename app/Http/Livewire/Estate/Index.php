<?php

namespace App\Http\Livewire\Estate;

use App\Models\Estate;
use App\Models\Utility;
use Livewire\Component;

class Index extends Component
{
    public $perPage = 12;
    protected $estates;
    public $MaxPrice;
    public $MinPrice;
    public $MinArea;
    public $MaxArea;
    public $Rooms = null;
    public $Utilities;
    public $SelectedUtilities = [];
    protected $listeners = [
        'load-more' => 'loadMore'
    ];
//add all qery string to url
    protected $queryString = [
        'MaxPrice' => ['except' => ''],
        'MinPrice' => ['except' => ''],
        'Rooms' => ['except' => ''],
        'SelectedUtilities' => ['except' => []],
    ];
    public function loadMore()
    {
        $this->perPage = $this->perPage + 12;
    }

    public function render()
    {
        $this->Utilities = Utility::all();
        if (!$this->estates) {
            $this->estates = Estate::with('images')->inRandomOrder()->paginate($this->perPage);
            $this->emit('userStore');
        }
        return view('livewire.estate.index', [
            'estates' => $this->estates
        ]);
    }


}
