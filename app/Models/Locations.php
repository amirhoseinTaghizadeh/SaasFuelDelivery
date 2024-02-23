<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
    use HasFactory;
    protected $fillable = ['lat', 'long', 'order_id'];

    public function order()
    {
        return $this->belongsTo(Orders::class);
    }
}
