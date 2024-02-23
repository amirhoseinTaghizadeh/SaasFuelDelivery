<?php

namespace App\Models;

use http\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $fillable = ['client_id', 'fuel_amount', 'fuel_type', 'delivery_deadline', 'user_id'];

    public function client()
    {
        return $this->belongsTo(Clients::class);
    }

    public function user()
    {
        return $this->belongsTo(Users::class);
    }

    public function locations()
    {
        return $this->hasMany(Locations::class);
    }

}
