<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// 👇 --- ¡FALTABAN ESTAS DOS LÍNEAS! --- 👇
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;
// 👆 -----------------------------------

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'is_active',
        'profile_photo_path',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // --- ACCESOR DE FOTO ---
    // Ahora sí funcionará porque importamos 'Attribute' y 'Storage' arriba
    protected function profilePhotoUrl(): Attribute
    {
        return Attribute::get(function () {
            if ($this->profile_photo_path) {
                return Storage::url($this->profile_photo_path);
            }

            $name = urlencode($this->name);
            return "https://ui-avatars.com/api/?name={$name}&color=7F9CF5&background=EBF4FF";
        });
    }

    public function workstations(): HasMany
    {
        return $this->hasMany(Workstation::class);
    }
}