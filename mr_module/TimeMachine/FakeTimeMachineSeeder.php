<?php
namespace MrModule\TimeMachine;

use Illuminate\Database\Seeder;

class FakeTimeMachineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(TimeMachine::class, 50)->create();
    }
}
