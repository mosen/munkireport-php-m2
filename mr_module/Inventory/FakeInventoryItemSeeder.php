<?php
namespace MrModule\Inventory;

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
        factory(InventoryItem::class, 50)->create();
    }
}
