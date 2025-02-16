<?php

namespace App\Policies;

use App\Models\Loan;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LoanPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-loans');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Loan $loan): bool
    {
        return $user->id == $loan->user_id;
    }

    /**
     * Determine whether the user can view all models.
     */
    public function viewAll(User $user)
    {
        return $user->can('view-all-loans');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create-loans');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        return $user->can('update-loans');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        return $user->can('delete-loans');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user): bool
    {
        return $user->can('restore-loans');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user): bool
    {
        return $user->can('force-delete-loans');
    }
}
