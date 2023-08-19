<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;
use Illuminate\Support\Facades\DB;

class Sponsor extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category', 'amount', 'item_id', 'website', 'img'];

    public function matchTotal()
    {
        $progress = DB::table('items')
            ->join('gift_item', 'items.id', '=', 'gift_item.item_id')
            ->join('gifts', 'gifts.id', '=', 'gift_item.gift_id')
            ->select(DB::raw('SUM(gifts.gift_total) as total') )
            ->where('items.sponsor_id', '=', $this->id )
            ->get();
        return $progress;
    }

    public function hasAvailableMatch()
    {
        $itemTotal = DB::table('items')
            ->join('gift_item', 'items.id', '=', 'gift_item.item_id')
            ->join('gifts', 'gifts.id', '=', 'gift_item.gift_id')
            ->select(DB::raw('SUM(gifts.gift_total) as total') )
            ->where('items.sponsor_id', '=', $this->id )
            ->get();
        $progress = $itemTotal->first()->total < $this->amount;
        return $progress;
    }

    public function matchProgress()
    {
        $itemTotal = DB::table('items')
            ->join('gift_item', 'items.id', '=', 'gift_item.item_id')
            ->join('gifts', 'gifts.id', '=', 'gift_item.gift_id')
            ->select(DB::raw('SUM(gift_item.item_quantity) as total') )
            ->where('items.sponsor_id', '=', $this->id )
            ->get();
        $item = Item::find( $this->item_id );
        $progress = ( ( $itemTotal->first()->total * $item->cost ) / $this->amount )  * 100;
        return $progress;
    }

}
