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
        // Event
        // FileVaultStatus
        $this->call('MrModule\FindMyMac\FakeFindMyMacSeeder');
        $this->call('MrModule\GSX\FakeGSXSeeder');
        $this->call('MrModule\Inventory\FakeInventoryItemSeeder');
        $this->call('MrModule\LocalAdmin\FakeLocalAdminSeeder');
        $this->call('MrModule\Location\FakeLocationSeeder');
        $this->call('MrModule\Machine\FakeMachineSeeder');
        $this->call('MrModule\ManagedInstalls\FakeManagedInstallSeeder');
        $this->call('MrModule\MunkiInfo\FakeMunkiInfoSeeder');
        $this->call('MrModule\MunkiReport\FakeMunkiReportSeeder');
        $this->call('MrModule\Network\FakeNetworkSeeder');
        $this->call('MrModule\Power\FakePowerSeeder');
        // Printer
        $this->call('MrModule\Profile\FakeProfileSeeder');
        $this->call('MrModule\ReportData\FakeReportDataSeeder');
        // SCCMStatus
        // Security
        $this->call('MrModule\Tag\FakeTagSeeder');
        $this->call('MrModule\TimeMachine\FakeTimeMachineSeeder');
        $this->call('MrModule\Warranty\FakeWarrantySeeder');
    }
}
