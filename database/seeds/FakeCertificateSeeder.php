<?php

use Illuminate\Database\Seeder;

class FakeCertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(MrModule\Certificate\Certificate::class, 50)->create();
    }
}
