<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Workstation;
use Illuminate\Auth\Access\Response;

class WorkstationPolicy
{
    // ¿Quién puede ver una PC específica?
    public function view(User $user, Workstation $workstation): bool
    {
        // El dueño O un empleado (admin/technician)
        return $user->id === $workstation->user_id || 
               in_array($user->role, ['admin', 'technician']);
    }

    // ¿Quién puede editar?
    public function update(User $user, Workstation $workstation): bool
    {
        // Mismas reglas: Dueño o Staff
        return $user->id === $workstation->user_id || 
               in_array($user->role, ['admin', 'technician']);
    }

    // ¿Quién puede borrar?
    public function delete(User $user, Workstation $workstation): bool
    {
        // SOLO Admin
        return $user->role === 'admin';
    }
}
