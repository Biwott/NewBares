<?php

namespace App\Http\Livewire\Admin\Spins;

use App\Models\Segment;
use Livewire\Component;
use Livewire\WithPagination;

class SpinSegments extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $empty_message = 'No Available Segements.';
    public $page_title = "List of All Segements";
    public $seg_id = '';
    public $name = '';
    public $color = '';
    public $amount = '';

    public function edit(Segment $segment)
    {
        $this->seg_id = $segment->id;
        $this->name = $segment->name;
        $this->color = $segment->color;
        $this->amount = $segment->amount;
    }

    public function cancel()
    {
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->color = '';
        $this->amount = '';
    }
    public function update()
    {
        $validated = $this->validate([
            'name' => 'required',
            'color' => 'required',
            'amount' => 'required',
        ]);

        if ($this->seg_id) {
            $segment = Segment::find($this->seg_id);
            $segment->update([
                'name' => $this->name,
                'color' => $this->color,
                'amount' => $this->amount,
            ]);

            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'warning',  'message' => "Successfuly Updated Segement!"]
            );
            $this->resetInputFields();
        }
    }


    public function render()
    {
        return view('livewire.admin.spins.spin-segments', [
            'segments' => Segment::latest()->paginate(10),
        ])->layout('layouts.admin');
    }
}
