<?php
namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Mr\BusinessUnit;
use Mr\MachineGroup;
use Mr\User;
use Tests\TestCase;

class BusinessUnitTest extends TestCase
{
    use DatabaseTransactions;

//    public function testUsersRelationship() {
//        $businessUnit = factory(BusinessUnit::class, 1)->create();
//        $user = factory(User::class, 1)->create([
//
//        ]);
//    }

    public function testMachineGroupRelationship() {
        $machineGroup = factory(MachineGroup::class, 1)->create();

        $businessUnit = new BusinessUnit;
        $businessUnit->unitid = 1;
        $businessUnit->property = BusinessUnit::PROP_MACHINE_GROUP;
        $businessUnit->value = $machineGroup->id;

        $businessUnit->save();
    }
}