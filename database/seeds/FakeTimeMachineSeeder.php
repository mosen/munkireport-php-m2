<?php

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
        factory(MrModule\TimeMachine\TimeMachine::class, 50)->create();
    }
}
