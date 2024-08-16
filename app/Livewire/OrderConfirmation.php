<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Gift;
use App\Models\Donor;

class OrderConfirmation extends Component
{
    public $gift, $showNameOnWall, $note, $donorUpdatedName, $hostToCredit;
    public $noteConfirmation = 0;
    public $nameConfirmation = 0;
    public $hostConfirmation = 0;
    
    public function mount($order_token)
    {
        $this->gift = Gift::where('order_token', '=', $order_token)->first();
        $this->showNameOnWall = Donor::where('gift_id', '=', $this->gift->id)->first()->showNameOnWall;
        $this->note = Donor::where('gift_id', '=', $this->gift->id)->first()->note;
        $this->donorUpdatedName = $this->gift->donor->full_name;
    }
    public function render()
    {
        return view('livewire.order-confirmation')->layout('layouts.guest');
    }
    
    public function showDonorName()
    {
        $this->showNameOnWall = !$this->showNameOnWall;
        Donor::where('gift_id', '=', $this->gift->id)
            ->update([
                'showNameOnWall' => $this->showNameOnWall,
            ]);
    }

    public function saveDonorNote()
    {
        Donor::where('gift_id', '=', $this->gift->id)
            ->update([
                'note' => $this->note,
            ]);
        $this->noteConfirmation = true;
    }

    public function updateDonorName()
    {
        Donor::where('gift_id', '=', $this->gift->id)
            ->update([
                'full_name' => $this->donorUpdatedName,
            ]);
        $this->nameConfirmation = true;
        $this->mount($this->gift->order_token);
    }

    public function creditHost()
    {
        Gift::where('id', '=', $this->gift->id)
            ->update([
                'user_id' => $this->hostToCredit,
            ]);
        $this->hostConfirmation = true;
    }
}
