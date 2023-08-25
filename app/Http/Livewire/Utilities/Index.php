<?php

namespace App\Http\Livewire\Utilities;

use App\Models\Order;
use App\Models\Utility;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $utilities;
    public $sortField;
    public $search;
    public $sortDirection;
    public $confirmUtilityDeletion;
    public $editUtility;
    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function mount()
    {
        $this->sortField = 'id';
        $this->sortDirection = 'desc';
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $this->utilities = Utility::withCount(['estates' => function ($query) {
            $query->select(DB::raw('count(distinct estate_id) as estate_count'));
        }])
            ->search(['name'], $this->search)
            ->OrderBy($this->sortField, $this->sortDirection)
            ->paginate(10);
        return view('livewire.utilities.index', [
            'utilities' => $this->utilities
        ]);
    }

    public function OrderBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortField = $field;
    }


    public function confirmUtilityDeletion($utility)
    {
        $this->confirmUtilityDeletion = $utility;
    }

    //edit
    public function edit($utility)
    {
        $this->editUtility = Utility::withoutGlobalScopes()->find($utility);
    }

    //resetFilters
    public function resetFilters()
    {
        $this->reset(['search']);
    }

}
