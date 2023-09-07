<?php

namespace App\Http\Livewire;
use App\Models\Gift;
use App\Models\Sponsor;
use Livewire\Component;
use Statamic\Facades\Entry;
use Statamic\Facades\GlobalSet;

class Results extends Component
{
    public $sponsor_total;
    public $donation_total;
    public $gift_total;
    public $outside_donors;

    public function mount()
    {
        $sponsors = Entry::query()->where('collection','sponsors')->get();
        $sponsor_sum = 0;
        foreach ( $sponsors as $sponsor ){
            $sponsor_sum += $sponsor->amount;
        }
        $this->sponsor_total = $sponsor_sum;
        $this->gift_total = Gift::all()->where('created_at', '>', '2023-01-01')->sum('gift_total');
        $this->donation_total = GlobalSet::findByHandle('campaign')->inCurrentSite()->get('donations');
        $this->outside_donors = GlobalSet::findByHandle('campaign')->inCurrentSite()->get('donors');
    }
    public function render()
    {
        
        return view('livewire.results');
    }
}
