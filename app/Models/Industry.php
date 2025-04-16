<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Industry extends Model
{
    protected $table = 'industries';

    protected $fillable = [
        'name',
    ];

    public function company(): HasMany
    {
        return $this->hasMany(Company::class);
    }
}
