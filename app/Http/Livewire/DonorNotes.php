<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Donor;

class DonorNotes extends Component
{
    public $donorsWithNotes;
    public function mount()
    {
        $this->donorsWithNotes = Donor::where('note', '!=', null)->get();
    }
    public function render()
    {
        return view('livewire.donor-notes');
    }
}
