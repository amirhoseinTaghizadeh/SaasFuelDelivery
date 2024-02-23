<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'company_info' , 'url'];

    public function users()
    {
        return $this->hasMany(Users::class);
    }

    public function clients()
    {
        return $this->hasMany(Clients::class);
    }

    public function trucks()
    {
        return $this->hasMany(Trucks::class);
    }
}
