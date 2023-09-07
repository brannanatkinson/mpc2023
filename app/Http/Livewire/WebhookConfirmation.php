<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Donor;
use App\Models\Gift;
use App\Models\Item;
use App\Models\Host;
use App\Models\User;
use App\Mail\HostCredited;
use App\Mail\OrderConfirmation;
use Illuminate\Support\Facades\Mail;

class WebhookConfirmation extends Component
{    
    public $result;

    public function mount(Request $request)
    {
        $this->result = $request->all();

        $donor = Donor::create([
            'order_token' => $this->result['content']['token'],
            'full_name' => $this->result['content']['billingAddressName'],
            'email_address' => $this->result['content']['email'],
            'address' => $this->result['content']['billingAddressAddress1'],
            'address_2' => $this->result['content']['billingAddressAddress2'],
            'city' => $this->result['content']['billingAddressCity'],
            'state' => $this->result['content']['billingAddressProvince'],
            'postal_code' => $this->result['content']['billingAddressPostalCode'],
        ]);
        
        // check if event host credited

        if ( $this->result['content']['items'][0]['customFields'][0]['value'] != '--' ) {
            $userId = User::where('name', $this->result['content']['items'][0]['customFields'][0]['value'])->first()->id;
        } else {
            $userId = null;
        } 

        $gift = Gift::create([
            'order_token' => $this->result['content']['token'],
            'donor_id' => $donor->id,
            'gift_total' => $this->result['content']['finalGrandTotal'],
            'user_id' => $userId,
        ]);

        Mail::to( $this->result['content']['email'] )->send(new OrderConfirmation($gift));

        $donor->gift_id = $gift->id;
        $donor->save();

        // send Donor thank you email

        foreach ( $this->result['content']['items'] as $newItem )
        {
            $itemIdToStore = Item::where('name', $newItem['name'])->first()->id;
            $gift->items()->attach( [ 'item_id' => $itemIdToStore ], [ 'item_quantity' => $newItem['quantity'] ] );
            if ( $userId != null )
            {
                User::find( $userId )->items()->attach( [ 'item_id' => $itemIdToStore ], [ 'item_quantity' => $newItem['quantity'] ] );
                $userEmail = User::where('name', $this->result['content']['items'][0]['customFields'][0]['value'])->first()->email;
            }    
        }

        if ( $userId != null ){
             //Mail::to( $userEmail )->send(new HostCredited($gift));
        }

    }

    public function render()
    {
        return view('livewire.webhook-confirmation')->layout('layouts.guest');
    }
}
