<?php

namespace App\Policies;

use App\Models\Medicine;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MedicinePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Medicine $medicine)
    {
        return $user->id === $medicine->user_id;
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, Medicine $medicine)
    {
        return $user->id === $medicine->user_id;
    }

    public function delete(User $user, Medicine $medicine)
    {
        return $user->id === $medicine->user_id;
    }

    public function restore(User $user, Medicine $medicine)
    {
        return $user->id === $medicine->user_id;
    }

    public function forceDelete(User $user, Medicine $medicine)
    {
        return $user->id === $medicine->user_id;
    }
}
