<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use App\Models\Item;
use App\Models\User;

class ItemButton extends Component
{
    /*
    |--------------------------------------------------------------------------
    | Button Formation
    |--------------------------------------------------------------------------
    |
    | Get ID from
    |
    */
    public $itemName = "Brannan";
    public $itemId;
    public $itemExcept;
    public $itemHosts;
    public $itemPrice;
    public $itemUrl;

    public function mount( $item )
    {
        
        $response = Http::get(env('APP_URL').'/api/collections/items/entries/' . $item);
        $result = json_decode($response);
        $this->itemId = $result->data->id;
        $this->itemName = $result->data->title;
        $this->itemExcerpt = $result->data->excerpt;
        $this->itemPrice = $result->data->price;
        $this->itemUrl = $result->data->url;

        $hostNames = '--|';
        $hosts = User::permission('edit host')->orderBy('name')->get();
        $lastElement = $hosts->last();
        foreach ( $hosts as $host ) {
            if ( $lastElement->name == $host->name ){
                $hostNames .= $host->name;
            }
            else {
                $hostNames .= $host->name . '|';
            }
        }
        
        $this->itemHosts = $hostNames;

        //dd ( session('host'));
        if( session('host') ) {
            $hostToCredit = session('host') ;
        }
        else {
            $hostToCredit = '--';
        }
    }
    public function render()
    {
        return view('livewire.item-button');
    }
}