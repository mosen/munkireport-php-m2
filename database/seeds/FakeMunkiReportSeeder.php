<?php

use Illuminate\Database\Seeder;

class FakeMunkiReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(MrModule\MunkiReport\MunkiReport::class, 50)->create();
    }
}
