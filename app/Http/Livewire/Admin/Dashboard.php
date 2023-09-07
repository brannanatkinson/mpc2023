<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Statamic\Facades\Entry;

class Dashboard extends Component
{
    public $test;
    public $gift_items;

    public function mount()
    {
        //$this->test = 'brannan';
        $this->gift_items = Entry::query()->where('collection','items')->where('status', 'published')->get();
    }
    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
