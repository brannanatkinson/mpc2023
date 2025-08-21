<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Item;


class Host extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email_address'];

    public function items()
    {
        return $this->belongsToMany(Item::class)->withPivot(['item_quantity'])->where('created_at', '>', date('Y').'-01-01');
    }

    public function totalDonationAmount()
    {
        $sales = DB::table('hosts')
            ->join('gifts', 'hosts.id', '=', 'gifts.host_id')
            ->select('hosts.name as host_name', DB::raw('SUM(gifts.gift_total) as sales') )
            ->groupBy('hosts.name')
            ->where('hosts.id', '=', $this->id )
            ->first();
        return $sales;
    }

    public function donatedItems()
    {
        $sales = DB::table('hosts')
            ->join('host_item', 'hosts.id', '=', 'host_item.host_id')
            ->join('items', 'items.id', '=', 'host_item.item_id')
            ->select('items.name as item_name', DB::raw('SUM(host_item.item_quantity) as quantity') )
            ->groupBy('items.name')
            ->where('hosts.id', '=', $this->id )
            ->get();
        return $sales;
    }

}



