<?php

use Illuminate\Database\Seeder;
use Mr\WidgetInstance;

class WidgetInstancesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WidgetInstance::create([
            'title' => 'Backup2Go',
            'type' => 'builtin.counters',
            'endpoint_uri' => '/xapi/backup2go',
            'endpoint_type' => 'json'
        ]);
        WidgetInstance::create([
            'title' => 'Bluetooth Battery',
            'type' => 'builtin.list',
            'endpoint_uri' => '/xapi/bluetooth',
            'endpoint_type' => 'json'
        ]);
        WidgetInstance::create([
            'title' => 'Certificates',
            'type' => 'builtin.counters',
            'endpoint_uri' => '/xapi/certificate',
            'endpoint_type' => 'json'
        ]);
        WidgetInstance::create([
            'title' => 'CrashPlan',
            'type' => 'builtin.counters',
            'endpoint_uri' => '/xapi/crashplan',
            'endpoint_type' => 'json'
        ]);
        WidgetInstance::create([
            'title' => 'Bound to DS',
            'type' => 'builtin.counters',
            'endpoint_uri' => '/xapi/directoryservice',
            'endpoint_type' => 'json'
        ]);
    }
}
