<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class TypeAssignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_assignment_id',
        'type_assignments_type',
        'my_bonus_field',
        'type_id',
    ];

    // Relationship to ProductType
    public function productType(): BelongsTo
    {
        return $this->belongsTo(ProductType::class, 'type_id');
    }

    // Polymorphic relationship to Product or Category
   /* public function typeAssignment()
    {
        return $this->morphTo('type_assignment', 'type_assignments_type', 'type_assignment_id');
    }*/

    // Polymorphic relationship to Product or Category
    public function typeAssignment(): MorphTo
    {
        return $this->morphTo('type_assignment', 'type_assignments_type', 'type_assignment_id');
    }
}
