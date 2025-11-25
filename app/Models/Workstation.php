<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // <--- 1. IMPORTANTE: Agregar esto
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Workstation extends Model
{
    use HasFactory; // <--- 2. IMPORTANTE: Usar el Trait aquí dentro

    protected $fillable = [
        'user_id',
        'name',
        'cpu',
        'ram',
        'gpu',
        'os',
        'status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}