<?php

namespace App\Http\Livewire\Estate;

use App\Models\Estate;
use Livewire\Component;

class Index extends Component
{
    public $perPage = 12;
    protected $estates;
    protected $listeners = [
        'load-more' => 'loadMore'
    ];
    public function loadMore()
    {
        $this->perPage = $this->perPage + 12;
    }

    public function render()
    {
        $this->estates = Estate::with('images')->paginate($this->perPage);
        $this->emit('userStore');
        return view('livewire.estate.index' , [
            'estates' => $this->estates
        ]);
    }
}
