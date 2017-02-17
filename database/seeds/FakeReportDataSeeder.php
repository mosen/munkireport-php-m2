<?php
use Illuminate\Database\Seeder;
use Mr\ReportData;

class FakeReportDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ReportData::class, 50)->create();
    }
}
