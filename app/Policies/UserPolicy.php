<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Spatie\Permission\Models\hasPermissionTo;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //return $user->hasRole(['Superadmin','User']);
        if($user->hasPermissionTo('View User')){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        return $user->hasRole('Superadmin');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if($user->hasPermissionTo('Create User')){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
        if($user->hasPermissionTo('Edit User')){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        if($user->hasPermissionTo('Delete User')){
            return true;
        }else{
            return false;
        }
        //return $user->hasRole(['Superadmin','User']);
    }

    /**
     * Determine for multiple bulkdelete.
     */

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
        return $user->hasRole('Superadmin');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */

    public function forceDelete(User $user, User $model): bool
    {
        return $user->hasRole('Superadmin');
    }

}
