<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['statamic_id', 'name', 'description', 'category_id', 'sponsor_id', 'cost', 'img', 'excerpt'];

    public function gifts()
    {
        return $this->belongsToMany(Gitt::class)->withTimestamps();
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function hosts()
    {
        return $this->belongsToMany(Host::class)->withPivot(['item_quantity'])->withTimestamps();
    }

    public function sponsor()
    {
        return $this->belongsTo(Sponsor::class);
    }

    public function sales()
    {
        $sales = DB::table('items')
            ->join('gift_item', 'items.id', '=', 'gift_item.item_id')
            ->join('gifts', 'gifts.id', '=', 'gift_item.gift_id')
            ->select('items.name as item_name', DB::raw('SUM(gift_item.item_quantity) as quantity') )
            ->groupBy('items.name')
            ->where('items.id', '=', $this->id )
            ->where('gift_item.created_at', '>', date('Y').'-01-01')
            ->get();
        return $sales;
    }

    public function matchToDate()
    {
        if( $this->sponsor ){
             return number_format( ( ( $this->sales()->first()->quantity * $this->cost ) / $this->sponsor->amount ) * 100, 0 );
        }
       
    }

    
}

