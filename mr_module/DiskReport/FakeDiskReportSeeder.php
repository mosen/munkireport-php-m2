<?php
namespace MrModule\DiskReport;

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
        factory(DiskReport::class, 50)->create();
    }
}
