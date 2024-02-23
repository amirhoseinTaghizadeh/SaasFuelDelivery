<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class Users extends Model
{
    use HasFactory , HasRoles;
    protected $fillable = ['name', 'email', 'password', 'company_id','role_id'];

    public function company()
    {
        return $this->belongsTo(Companies::class);
    }

    public function orders()
    {
        return $this->hasMany(Oders::class);
    }

    public function roles(): BelongsToMany
    {
        return $this->hasMany(Role::class);
    }


}
