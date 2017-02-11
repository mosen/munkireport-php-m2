<?php

use Illuminate\Database\Seeder;

class FakeInventoryItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(MrModule\Inventory\InventoryItem::class, 50)->create();
    }
}
