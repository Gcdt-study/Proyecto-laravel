<?php

namespace App\Policies;

use App\Models\Incidencia;
use App\Models\User;
use Illuminate\Auth\Access\Response;


class IncidenciaPolicy
{
    /**
     * Permisos globales para el TDE.
     * El TDE puede ver y resolver, pero NO editar ni borrar.
     */
    public function before(User $user, $ability)
    {
        if ($user->profesor->es_tde && in_array($ability, ['view', 'viewAny', 'resolve'])) {
            return true;
        }
    }

    /**
     * Ver una incidencia.
     * Profesores normales: solo las suyas.
     * TDE: permitido por before().
     */
    public function view(User $user, Incidencia $incidencia)
    {
        return $incidencia->user_id === $user->id;
    }

    /**
     * Ver listado de incidencias.
     * Permitido para todos (el controlador ya filtra).
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Editar una incidencia.
     * Solo el creador puede editar.
     */
    public function update(User $user, Incidencia $incidencia)
    {
        return $incidencia->user_id === $user->id;
    }

    /**
     * Eliminar una incidencia.
     * Solo el creador puede borrar.
     */
public function delete(User $user, Incidencia $incidencia)
{
    // No se puede eliminar si está resuelta
    if ($incidencia->estado === 'resuelta') {
        return false;
    }

    // Solo el creador puede eliminar
    return $user->id === $incidencia->user_id;
}


    /**
     * Resolver una incidencia.
     * Solo el TDE puede resolver (controlado por before()).
     */
    public function resolve(User $user, Incidencia $incidencia)
    {
        return $user->profesor->es_tde;
    }
}
