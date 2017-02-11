<?php

use Illuminate\Database\Seeder;

class FakeLocalAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(MrModule\LocalAdmin\LocalAdmin::class, 50)->create();
    }
}
