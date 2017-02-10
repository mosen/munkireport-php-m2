<?php

use Illuminate\Database\Seeder;

class FakeDisplaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(MrModule\Display\Display::class, 50)->create();
    }
}
