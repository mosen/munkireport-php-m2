<?php
namespace MrModule\DiskReport;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use MrModule\DiskReport\CheckInHandler;
use Tests\TestCase;

class CheckInHandlerTest extends TestCase
{
    use DatabaseTransactions;

    protected $plistData;

    public function setUp()
    {
        parent::setUp();
        $this->plistData = file_get_contents(__DIR__ . '/fixtures/disk.plist');
    }

    public function testProcess() {
        $handler = new CheckInHandler();
        $handler->process('diskreport', 'ABC123', $this->plistData);
    }
}
