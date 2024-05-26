<?php

namespace App\Models;

use App\Models\Scopes\UserScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
        'description',
        'due_date',
        'status',
        'created_at',
        'updated_at',
    ];

    protected static function booted(): void
    {
        static::addGlobalScope(new UserScope);
    }
}
