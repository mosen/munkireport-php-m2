<?php
namespace MrModule\ManagedInstalls;

use Illuminate\Database\Seeder;

class FakeManagedInstallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ManagedInstall::class, 50)->create();
    }
}
