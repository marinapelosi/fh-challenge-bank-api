<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class AccountTest extends TestCase
{   
    public function testCheckBalance()
    {        
        $response = $this->json('GET', '/check-balance', ['accountNumber' => '889955-1']);
        $response->assertStatus(200);
    }

    public function testGetMoney()
    {        
        $response = $this->json('GET', '/get-from-balance', ['accountNumber' => '889955-1', 'amountMoney' => '500.50']);
        $response->assertStatus(200);
    }
    
    public function testGetMoneyButDontHaveEnough()
    {        
        $response = $this->json('GET', '/get-from-balance', ['accountNumber' => '889955-1', 'amountMoney' => '5000.00']);
        $response->assertStatus(400);
    }
}
