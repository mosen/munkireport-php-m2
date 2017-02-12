<?php
namespace MrModule\Machine;

use Illuminate\Database\Seeder;

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
