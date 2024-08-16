<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Donor;

class DonorNotes extends Component
{
    public $donorsWithNotes;
    public function mount()
    {
        ray ( date('Y-m-d', strtotime('first day of january this year')) );
        $this->donorsWithNotes = Donor::where('note', '!=', null)->where('created_at', '>', '2023-01-01')->get();
    }
    public function render()
    {
        return view('livewire.donor-notes');
    }
}
