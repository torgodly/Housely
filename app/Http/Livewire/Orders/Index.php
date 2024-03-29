<?php

namespace App\Http\Livewire\Orders;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $orders;
    public $sortField;
    public $search;
    public $sortDirection;
    public $ID;
    public $phone_number;
    protected $queryString = [
        'ID' => ['except' => ''],
        'phone_number' => ['except' => ''],
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
        $this->orders = Order::query()
            ->search(['estate_id'], $this->ID)
            ->search(['phone_number'], $this->phone_number)
            ->join('estates', 'orders.estate_id', '=', 'estates.id')
            ->select('orders.*')
            ->with('estate')
            ->search(['orders.code', 'phone_number','estates.code'], $this->search)
            ->orderBy($this->sortField, $this->sortDirection) // Use correct column name here
            ->paginate(20);
//        dd($this->orders);

        return view('livewire.orders.index', [
            'orders' => $this->orders
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

    //resetFilters
    public function resetFilters()
    {
        $this->reset(['search', 'ID', 'phone_number']);
    }
}
