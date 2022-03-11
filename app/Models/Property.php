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

    protected $appends = [
        'image_url',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tenants()
    {
        return $this->belongsToMany(Tenant::class, 'tenancies');
    }

    public function tenancies()
    {
        return $this->hasMany(Tenancy::class);
    }

    public function getImageUrlAttribute()
    {
        return "storage/properties/$this->image";
    }
}
