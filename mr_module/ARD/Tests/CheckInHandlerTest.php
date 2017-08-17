<?php
namespace MrModule\ARD\Tests;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use MrModule\ARD\CheckInHandler;
use Tests\TestCase;

class CheckInHandlerTest extends TestCase
{
    use DatabaseTransactions;

    protected $plistData;

    public function setUp()
    {
        parent::setUp();
        $this->plistData = file_get_contents(__DIR__ . '/fixtures/com.apple.RemoteDesktop-10.12.5.plist');
    }

    public function testProcess() {
        $handler = new CheckInHandler();
        $handler->process('ard', 'ABC123', $this->plistData);
    }
}
