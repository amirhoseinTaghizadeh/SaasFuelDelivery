<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trucks extends Model
{
    use HasFactory;
    protected $fillable = ['plate_number', 'driver_info', 'capacity', 'company_id'];

    public function company()
    {
        return $this->belongsTo(Companies::class);
    }
}
