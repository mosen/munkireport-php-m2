<?php
namespace MrModule\Network\Tests;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use MrModule\Certificate\CheckInHandler;
use Tests\TestCase;

class CheckInHandlerTest extends TestCase
{
    use DatabaseTransactions;

    protected $data;

    public function setUp()
    {
        parent::setUp();
        $this->data = file_get_contents(__DIR__ . '/fixtures/networkinfo.txt');
    }

    public function testProcess() {
        $handler = new CheckInHandler();
        $handler->process('network', 'ABC123', $this->data);
    }
}
