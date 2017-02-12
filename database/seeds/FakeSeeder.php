<?php

use Illuminate\Database\Seeder;

class FakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('MrModule\ARD\FakeARDSeeder');
        $this->call('MrModule\Bluetooth\FakeBluetoothSeeder');
        $this->call('MrModule\Certificate\FakeCertificateSeeder');
        $this->call('MrModule\Comment\FakeCommentSeeder');
        $this->call('MrModule\CrashPlan\FakeCrashPlanSeeder');
        $this->call('MrModule\DeployStudio\FakeDeployStudioSeeder');
        $this->call('MrModule\DirectoryService\FakeDirectoryServiceSeeder');
        $this->call('MrModule\DiskReport\FakeDiskReportSeeder');
        $this->call('MrModule\Display\FakeDisplaySeeder');
    }
}
