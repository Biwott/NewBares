<?php

namespace App\Http\Livewire\Admin\Spins;

use App\Models\Spin;
use Livewire\Component;
use Livewire\WithPagination;

class AllSpins extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $empty_message = 'No Available Spins.';
    public $page_title = "List of All Spins";


    public $spin_id = '';
    public $minimum = '';
    public $maximum = '';
    public $date_from = '';
    public $date_to = '';
    public $limit = '';


    public function edit(Spin $spin)
    {
        $this->spin_id = $spin->id;
        $this->minimum = $spin->min_amount;
        $this->maximum = $spin->max_amount;
        $this->date_from = $spin->spin_from;
        $this->date_to = $spin->spin_to;
        $this->limit = $spin->spin_limit;
    }

    public function cancel()
    {
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->minimum = '';
        $this->maximum = '';
        $this->date_from = '';
        $this->date_to = '';
        $this->limit = '';
    }
    public function update()
    {
        $this->validate([
            'minimum' => 'required',
            'maximum' => 'required',
            'date_from' => 'required',
            'date_to' => 'required',
            'limit' => 'required',
        ]);

        if ($this->spin_id) {
            $segment = Spin::find($this->spin_id);
            $segment->update([
                'min_amount' => $this->minimum,
                'max_amount' => $this->maximum,
                'spin_from' => $this->date_from,
                'spin_to' => $this->date_to,
                'spin_limit' => $this->limit
            ]);

            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'warning',  'message' => "Successfuly Updated Free Spin !"]
            );
            $this->resetInputFields();
        }
    }




    public function render()
    {
        return view('livewire.admin.spins.all', [
            'spins' => Spin::latest()->paginate(10),
        ])->layout('layouts.admin');
    }
}
