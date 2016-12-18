<?php

namespace App\Policies;

use Auth;
use App\User;
use App\Solve;
use Illuminate\Auth\Access\HandlesAuthorization;

class SolvePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the solve.
     *
     * @param  \App\User  $user
     * @param  \App\Solve  $solve
     * @return mixed
     */
    public function view(User $user, Solve $solve)
    {
        return $solve->userId === $user->id;
    }

    /**
     * Determine whether the user can create solves.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the solve.
     *
     * @param  \App\User  $user
     * @param  \App\Solve  $solve
     * @return mixed
     */
    public function update(User $user, Solve $solve)
    {
        return $solve->userId === $user->id;
    }

    /**
     * Determine whether the user can delete the solve.
     *
     * @param  \App\User  $user
     * @param  \App\Solve  $solve
     * @return mixed
     */
    public function delete(User $user, Solve $solve)
    {
        return $solve->userId === $user->id;
    }
}
