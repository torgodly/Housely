<?php

namespace App\Http\Livewire\Estate;

use App\Models\Estate;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    protected $estates;
    public $sortField;
    public $search;
    public $sortDirection;
    public $confirmEstateDeletion;

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
        $this->estates = Estate::withoutGlobalScope('available')
            ->search(['company', 'city', 'country', 'code'], $this->search)
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(20);
        return view('livewire.estate.table', [
            'estates' => $this->estates]);
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

    public function confirmEstateDeletion($estate)
    {
        $this->confirmEstateDeletion = $estate;
    }
}
