<?php

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
        factory(MrModule\CrashPlan\CrashPlan::class, 50)->create();
    }
}
