<?php

use Illuminate\Database\Seeder;

class FakeWarrantySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(MrModule\Warranty\Warranty::class, 50)->create();
    }
}
