<?php

namespace Mr\Policies;

use Mr\MachineGroup;
use Mr\User;
use Mr\Machine;
use Illuminate\Auth\Access\HandlesAuthorization;

class MachinePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the machine.
     *
     * With business units disabled:
     * - Anyone can view.
     *
     * With business units enabled:
     * - Admins can always view.
     * - Manager or User can only view their own Business Unit.
     * - Nobody role cannot view anything.
     *
     * @param  \Mr\User  $user
     * @param  \Mr\Machine  $machine
     * @return mixed
     */
    public function view(User $user, Machine $machine)
    {
        // user must be admin or manager
        if (!config('munkireport.enable_business_units', false)) return true;
        if ($user->hasRole('admin')) return true;
        if ($user->hasRole('nobody')) return false;

        $mgKv = $machine->machineGroupKeyVals()->get();
        if (count($mgKv) === 0) return false; // TODO: just denying here if machine is not part of a group.

        $machineBusinessUnits = $mgKv[0]->businessUnits()->get();

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
