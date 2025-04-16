<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'type',
        'uuid',
    ];

    protected function casts(): array
    {
        return [
            'uuid' => 'string',
        ];
    }

    public function userUuid(): HasMany
    {
        return $this->hasMany(User::class, 'user_uuid');
    }

    public function industry(): BelongsTo
    {
        return $this->belongsTo(Industry::class);
    }
}
