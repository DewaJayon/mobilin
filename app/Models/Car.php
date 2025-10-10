<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Cviebrock\EloquentSluggable\Sluggable;

class Car extends Model
{
    /** @use HasFactory<\Database\Factories\CarFactory> */
    use HasFactory, Sluggable;

    protected $fillable = [
        'category_id',
        'brand',
        'model',
        'license_plate',
        'year',
        'price_per_day',
        'status',
        'fuel_type',
        'seats',
        'transmission',
        'image',
        'description',
        'slug',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['brand', 'model']
            ]
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(CarCategory::class);
    }
}
