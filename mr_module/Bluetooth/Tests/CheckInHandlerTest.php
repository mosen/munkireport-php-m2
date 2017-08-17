<?php
namespace MrModule\Bluetooth\Tests;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use MrModule\Bluetooth\CheckInHandler;
use Tests\TestCase;

class CheckInHandlerTest extends TestCase
{
    use DatabaseTransactions;

    protected $plistData;

    public function setUp()
    {
        parent::setUp();
        $this->plistData = file_get_contents(__DIR__ . '/fixtures/bluetoothinfo.plist');
    }

    public function testProcess() {
        $handler = new CheckInHandler();
        $handler->process('bluetooth', 'ABC123', $this->plistData);
    }
}
