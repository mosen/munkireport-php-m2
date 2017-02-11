<?php

use Illuminate\Database\Seeder;

class FakeDeployStudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(MrModule\DeployStudio\DeployStudioInfo::class, 50)->create();
    }
}
