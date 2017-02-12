<?php
namespace MrModule\LocalAdmin;

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
        factory(LocalAdmin::class, 50)->create();
    }
}
