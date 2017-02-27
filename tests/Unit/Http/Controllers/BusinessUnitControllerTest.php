<?php
namespace Tests\Unit\Http\Controllers;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Mr\User;
use Tests\TestCase;

class BusinessUnitControllerTest extends TestCase
{
    use DatabaseTransactions;

    protected $admin;
    protected $manager;
    protected $user;

    public function setUp() {
        parent::setUp();
        
        $this->admin = factory(User::class)->create();
        $this->manager = factory(User::class)->create();
        $this->user = factory(User::class)->create();
    }

    public function testStore()
    {
        $response = $this->json('POST', '/api/business_units', [
            'name' => 'Test Business Unit',
            'address' => '1 Business Unit Way',
            'link' => 'http://businessunit',

            'admins' => [
                $this->admin->email,
            ],
            'managers' => [
                $this->manager->email,
            ],
            'users' => [
                $this->manager->user,
            ]
        ]);

        $response->assertStatus(201)
            ->assertJson(['name' => 'Test Business Unit']);
    }
}
