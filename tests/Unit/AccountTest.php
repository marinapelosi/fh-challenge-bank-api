<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class AccountTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCheckBalance()
    {        
        $response = $this->json('GET', '/check-balance', ['accountNumber' => '889955-1']);
        $response->assertStatus(201);
    }
}
