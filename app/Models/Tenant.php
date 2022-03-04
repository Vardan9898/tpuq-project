<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function tenancies()
    {
        return $this->hasMany(Tenancy::class);
    }
}
