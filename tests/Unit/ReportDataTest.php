<?php

namespace Tests\Feature;

use Mr\Machine;
use Mr\MachineGroup;
use Mr\ReportData;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ReportDataTest extends TestCase
{
    use DatabaseTransactions;

    private $machine;
    private $reportData;
    private $machineGroupValues;

    public function setUp() {
        parent::setUp();

        $this->machine = factory(Machine::class)->create();
        $this->reportData = factory(ReportData::class)->create([
            'serial_number' => $this->machine->serial_number,
            'machine_group' => 99,
        ]);

        $this->machineGroupValues = MachineGroup::createWithParameters(99, 'TestMachineGroup');
    }

    public function testMachineGroupKeyValsRelationship() {
        $mgKv = $this->reportData->machineGroupKeyVals()->get();
        $this->assertNotEmpty($mgKv);
        $this->assertCount(2, $mgKv);
    }
}
