<?php

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
        factory(MrModule\Machine\Machine::class, 50)->create();
    }
}
