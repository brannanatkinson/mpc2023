<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Statamic\Facades\Entry;

class SponsorList extends Component
{
    public function render()
    {
        $sponsors = Entry::query()
            ->where('collection','sponsors')
            ->whereIn('status', ['published'])
            ->orderBy('amount', 'desc')
            ->orderBy('name', 'asc')
            ->get();
        return view('livewire.admin.sponsor-list', compact('sponsors'));
    }
}
