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

        

        // Manager and user may view within their own BU
        $managerOf = $user->managerOfBusinessUnits();
        $userOf = $user->userOfBusinessUnits();

        $mgKv = $machine->machineGroupKeyVals();
        $machineGroup = MachineGroup::hash($mgKv);
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
