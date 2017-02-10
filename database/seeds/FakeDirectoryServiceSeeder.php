<?php

use Illuminate\Database\Seeder;

class FakeDirectoryServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(MrModule\DirectoryService\DirectoryService::class, 50)->create();
    }
}
