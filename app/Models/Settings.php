<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable = [
        'logo',
        'favicon',
        'site_colors',
        'contact_info',
        'copyright',
    ];

    protected $casts = [
        'site_colors' => 'array', // If stored as JSON
    ];
}
