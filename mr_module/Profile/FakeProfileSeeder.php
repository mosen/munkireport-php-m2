<?php
namespace MrModule\Profile;

use Illuminate\Database\Seeder;

class FakeProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Profile::class, 50)->create();
    }
}
