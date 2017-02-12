<?php
namespace MrModule\DeployStudio;

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
        factory(DeployStudioInfo::class, 50)->create();
    }
}
