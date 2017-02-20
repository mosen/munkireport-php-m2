<?php

namespace Tests\Feature;

use Mr\BusinessUnit;
use Mr\MachineGroup;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MachineGroupTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp() {
        parent::setUp();

        $this->machineGroupValues = MachineGroup::createWithParameters(99, 'TestMachineGroup');
        $this->businessUnitValues = BusinessUnit::createWithParameters(99, 'TestBusinessUnit', 'No Address', 'No Link');
    }

    public function testBusinessUnitsRelationship() {
        $busql = $this->machineGroupValues['name']->businessUnits()->getQuery()->toSql();
        $bu = $this->machineGroupValues['name']->businessUnits()->get();
        $this->assertNotEmpty($bu);
    }
}
