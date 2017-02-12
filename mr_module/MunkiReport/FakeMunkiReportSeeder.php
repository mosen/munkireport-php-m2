<?php
namespace MrModule\MunkiReport;

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
        factory(MunkiReport::class, 50)->create();
    }
}
