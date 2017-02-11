<?php

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
        factory(MrModule\ManagedInstalls\ManagedInstall::class, 50)->create();
    }
}
