<?php
use Illuminate\Database\Seeder;
use Mr\Machine;

class FakeMachineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Machine::class, 50)->create();
    }
}
