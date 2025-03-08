<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'name',
        'price',
        'description',
        'status',
        'product_category_id',
        'product_color_id',
    ];

    // Relationship to TypeAssignment
    public function typeAssignments(): HasMany
    {
        return $this->hasMany(TypeAssignment::class, 'type_assignment_id')
            ->where('type_assignments_type', self::class);
    }

    // Relationship to ProductCategory
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    // Relationship to ProductColor
    public function color()
    {
        return $this->belongsTo(ProductColor::class, 'product_color_id');
    }
}
