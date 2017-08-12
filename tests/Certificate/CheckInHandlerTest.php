<?php
namespace Tests\Certificate;

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
        $this->data = file_get_contents(__DIR__ . '/fixtures/certificate.txt');
    }

    public function testProcess() {
        $handler = new CheckInHandler();
        $handler->process('certificate', 'ABC123', $this->data);
    }
}
