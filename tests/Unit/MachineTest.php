<?php
namespace Tests\Unit;

use Mr\MachineGroup;
use Mr\ReportData;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Mr\Machine;

class MachineTest extends TestCase
{
    use DatabaseTransactions;

    private $machine;
    private $reportData;
    private $machineGroupValues;

    public function setUp() {
        $this->machine = factory(\Mr\Machine::class)->create();
        $this->reportData = factory(\Mr\ReportData::class)->create([
            'serial_number' => $this->machine->serial_number,
            'machine_group' => 99,
        ]);
        
        $this->machineGroupValues = MachineGroup::createWithParameters(99, 'TestMachineGroup');
    }

    public function testMachineGroupKeyValsRelationship() {
        $mgValues = $this->machine->machineGroupKeyVals();
        $this->assertNotEmpty($mgValues);
    }
}
