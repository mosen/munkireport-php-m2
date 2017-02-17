<?php
use Illuminate\Database\Seeder;

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
