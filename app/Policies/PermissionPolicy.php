<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Permission;
use Illuminate\Auth\Access\Response;

class PermissionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if($user->hasPermissionTo('View Permission')){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Permission $model): bool
    {
        if($user->hasPermissionTo('View Permission')){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if($user->hasPermissionTo('Create Permission')){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Permission $model): bool
    {
        if($user->hasPermissionTo('Edit Permission')){
            return true;
        }else{
            return false;
        }
    }

    public function delete(User $user, Permission $model): bool
    {
        if($user->hasPermissionTo('Delete Permission')){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Permission $model): bool
    {
        return $user->hasRole(['Superadmin','User']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Permission $model): bool
    {
        return $user->hasRole('Superadmin');
    }


}
