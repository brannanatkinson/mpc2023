<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    use HasFactory;
    protected $fillable = ['full_name','email_address','order_token','address','address_2','city','state','postal_code', 'note'];


    public function gift()
    {
        return $this->hasOne(Gift::class);
    }
}
