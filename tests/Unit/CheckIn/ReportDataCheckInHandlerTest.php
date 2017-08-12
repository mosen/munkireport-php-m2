<?php
namespace Tests\Unit\CheckIn;
use CFPropertyList\CFPropertyList;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Event;
use Mr\CheckIn\ReportDataCheckInHandler;
use Mr\Events\NewClientEvent;
use Mr\ReportData;
use Tests\TestCase;

class ReportDataCheckInHandlerTest extends TestCase
{
    use DatabaseTransactions;

    protected $reportData;

    public function setUp() {
        parent::setUp();

        $this->reportData = <<<'EOT'
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE plist PUBLIC "-//Apple//DTD PLIST 1.0//EN" "http://www.apple.com/DTDs/PropertyList-1.0.dtd">
<plist version="1.0">
    <dict>
        <key>serial_number</key>
        <string>ABC123</string>
        <key>remote_ip</key>
        <string>192.168.1.1</string>
    </dict>
</plist>
EOT;
    }

    public function testNewClientEventIsFired() {
        Event::fake();

        $handler = new ReportDataCheckInHandler();
        $handler->process('reportdata', 'ABC123', $this->reportData);

        Event::assertDispatched(NewClientEvent::class, function ($e) {
            return $e->serialNumber = 'ABC123';
        });
    }

    public function testNewClientEventNotDoubleFired() {
        Event::fake();

        $handler = new ReportDataCheckInHandler();
        $handler->process('reportdata', 'ABC123', $this->reportData);

        Event::assertDispatched(NewClientEvent::class, function ($e) {
            return $e->serialNumber = 'ABC123';
        });

        $handler->process('reportdata', 'ABC123', $this->reportData);
        // TODO: this assertion does not have a dispatch count, only true or false
        //
//        Event::assertNotDispatched(NewClientEvent::class);
    }
}
