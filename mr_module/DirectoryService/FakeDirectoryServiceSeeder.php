<?php
namespace MrModule\DirectoryService;

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
        factory(DirectoryService::class, 50)->create();
    }
}
