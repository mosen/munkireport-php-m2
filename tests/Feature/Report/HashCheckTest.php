<?php

namespace Tests\Feature\Report;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HashCheckTest extends TestCase
{
    public function testHashCheck() {
        $items = 'a:2:{s:7:"machine";a:1:{s:4:"hash";s:32:"8ba66eb0a8622d34dbc721edc538a884";}s:10:"reportdata";a:1:{s:4:"hash";s:32:"87779893a86937b6c6016a6279f20288";}}';

        $response = $this->post('/report/hash_check', [
            'serial' => 'X02X902X0X0X',
            'passphrase' => null,
            'items' => $items
        ]);

        $response->assertStatus(200);
    }
}
