<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MunkiReport2MigrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // TODO: insert into mr_hash from hash
        $existingHashCount = Mr\Hash::all()->count();
        if ($existingHashCount > 0) {
            $this->command->warn('Not performing migration of hashes from MunkiReport-PHP v2, some already exist in the new database and they would be overwritten.');
        } else {
            DB::insert('INSERT INTO mr_hash (serial, name, hash) SELECT serial, name, hash FROM hash');
        }
        

        // TODO: insert into mr_event from event
    }
}
