<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    use HasFactory;
    protected $fillable = ['donor_id', 'order_token', 'gift_total', 'user_id', 'excerpt'];

    public function items()
    {
        return $this->belongsToMany(Item::class)->withPivot(['item_quantity'])->withTimestamps();
    }

    public function totalDonations()
    {
        return Gift::all()->withSum('order_total');
    }

    public function donor(){
        return $this->belongsTo(Donor::class);
    }

    public function sponsor()
    {
        return $this->belongsTo(Sponsor::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
