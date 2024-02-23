<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Orders;

class Clients extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'client_info', 'company_id'];

    public function company()
    {
        return $this->belongsTo(Companies::class);
    }

    public function orders()
    {
        return $this->hasMany(Orders::class);
    }

}
