<?php

namespace Tests\Feature;

use Mr\BusinessUnit;
use Mr\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    private $businessUnitValues;
    private $user;
    private $businessUnitMemberManager;

    public function setUp() {
        parent::setUp();

        $this->businessUnitValues = BusinessUnit::createWithParameters(99, 'TestBusinessUnit', 'No Address', 'No Link');
        $this->user = factory(User::class)->create();
        $this->businessUnitMemberManager = new BusinessUnit;
        $this->businessUnitMemberManager->unitid = 99;
        $this->businessUnitMemberManager->property = BusinessUnit::PROP_MANAGER;
        $this->businessUnitMemberManager->value = $this->user->id;
        $this->businessUnitMemberManager->save();
    }

    public function testBusinessUnitRelationship() {
        $bu = $this->user->businessUnits()->getQuery();
        $busql = $bu->toSql();
        $this->assertNotEmpty($bu);
    }
}
