<?php

use Illuminate\Database\Seeder;

class FakeDiskReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(MrModule\DiskReport\DiskReport::class, 50)->create();
    }
}
