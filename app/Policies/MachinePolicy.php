<?php

namespace Mr\Policies;

use Mr\User;
use Mr\Machine;
use Illuminate\Auth\Access\HandlesAuthorization;

class MachinePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the machine.
     *
     * @param  \Mr\User  $user
     * @param  \Mr\Machine  $machine
     * @return mixed
     */
    public function view(User $user, Machine $machine)
    {
        if (!config('munkireport.enable_business_units', false)) return true;

        $managerOf = $user->managerOfBusinessUnits();
        $userOf = $user->userOfBusinessUnits();
        
    }

    /**
     * Determine whether the user can create machines.
     *
     * @param  \Mr\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the machine.
     *
     * @param  \Mr\User  $user
     * @param  \Mr\Machine  $machine
     * @return mixed
     */
    public function update(User $user, Machine $machine)
    {
        //
    }

    /**
     * Determine whether the user can delete the machine.
     *
     * @param  \Mr\User  $user
     * @param  \Mr\Machine  $machine
     * @return mixed
     */
    public function delete(User $user, Machine $machine)
    {
        // TODO: user role false
    }
}
