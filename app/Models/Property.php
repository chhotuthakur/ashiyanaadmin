<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'city',
        'residential',
        'property_type',
        'apartment_type',
        'bhk_type',
        'ownership',
        'plot_area',
        'built_up_area',
        'facing',
        'total_floor',
        'price',
        'furniture_type',
        'parking',
        'bathroom',
        'balcony',
        'who_will_use',
        'gated_security',
        'water_supply',
        'power_backup',
        'amenities',
        'locality',
        'landmark',
        'certified_approval',
        'taxes',
        'availability',
        'time_schedule',
        'photos',
    ];

    protected $casts = [
        'amenities' => 'array',
        'photos' => 'array',
        'parking' => 'boolean',
        'gated_security' => 'boolean',
        'water_supply' => 'boolean',
        'power_backup' => 'boolean',
    ];
}
