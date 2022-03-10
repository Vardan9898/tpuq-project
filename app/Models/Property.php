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
        return $this->belongsToMany(Tenant::class)->withPivot('tenancies');
    }

    public function tenancies()
    {
        return $this->hasMany(Tenancy::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query
                ->where('name', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%')
                ->orWhere('address', 'like', '%' . $search . '%');
        });
    }

    public function getImageUrlAttribute()
    {
        return "storage/prop_img/$this->image";
    }
}
