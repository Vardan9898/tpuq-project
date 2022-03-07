<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'mortgage_status' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tenant()
    {
        return $this->belongsToMany(Tenant::class);
    }

    public function tenancies()
    {
        return $this->hasMany(Tenancy::class);
    }
}
