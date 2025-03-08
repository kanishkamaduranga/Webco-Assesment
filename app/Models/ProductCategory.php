<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductCategory extends Model
{
    protected $fillable = [
        'name',
        'description',
        'external_url',
        'status'
    ];

    // Relationship to TypeAssignment
    public function typeAssignments(): HasMany
    {
        return $this->hasMany(TypeAssignment::class, 'type_assignment_id')
            ->where('type_assignments_type', self::class);
    }
}
