<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tenant extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'uuid',
        'Welcome_email_sent_at',
    ];

    protected function casts(): array
    {
        return [
            'uuid' => 'string',
            'Welcome_email_sent_at' => 'timestamp',
        ];
    }
}
