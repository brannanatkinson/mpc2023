<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Donor;

class DonorWall extends Component
{
    public $donorsForWall; 

    public function mount()
    {
        $this->donorsForWall = Donor::where('showNameOnWall', '=', 1)
            ->where('created_at', '>', '2023-01-01')
            ->orderBy('full_name')
            ->get();
    }

    public function render()
    {
        return view('livewire.donor-wall');
    }
}
