<?php

use Illuminate\Database\Seeder;

class FakeARDSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(MrModule\ARD\ARDInfo::class, 50)->create();
    }
}
