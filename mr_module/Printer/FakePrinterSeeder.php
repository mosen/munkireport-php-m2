<?php
namespace MrModule\Printer;

use Illuminate\Database\Seeder;

class FakePrinterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Printer::class, 50)->create();
    }
}
