<?php
namespace MrModule\CrashPlan;

use Illuminate\Database\Seeder;

class FakeCrashPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CrashPlan::class, 50)->create();
    }
}
