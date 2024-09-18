<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Config;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;


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
    public $itemName;
    public $itemId;
    public $itemExcerpt;
    public $itemHosts;
    public $itemPrice;
    public $itemUrl;
    public $hostToCredit;

    public function mount( $item )
    {
        $response = Http::get(Config::get('app.url').'/api/collections/items/entries/' . $item);
        $result = json_decode($response);
        $this->itemId = $result->data->id;
        $this->itemName = $result->data->title;
        $this->itemExcerpt = $result->data->excerpt;
        $this->itemPrice = $result->data->price;
        $this->itemUrl = $result->data->url;

        $hostNames = '--|';
        $hosts = User::permission('edit host')
            ->whereHas('campaigns', function( Builder $query){
                $query->where('year', '=', date('Y'));
            })
            ->orderBy('name')
            ->get();
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
            $this->hostToCredit = session('host') ;
        }
        else {
            $this->hostToCredit = '--';
        }
    }
    public function render()
    {
        return view('livewire.item-button');
    }
}
