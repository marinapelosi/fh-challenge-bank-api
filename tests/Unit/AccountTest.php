<?php

namespace Tests\Unit;

use Tests\TestCase;

class AccountTest extends TestCase
{   
    public function testCheckBalance()
    {                
        $response = $this->getJson('/api/check-balance/889955-1');        
        $response->assertStatus(200);
    }

    
    public function testGettingMoney()
    {        
        $response = $this->getJson('/api/move-account-balance/889955-1/500.50/sacar');        
        $response->assertStatus(200);
    }
    
    public function testGettingMoneyButDontHaveEnough()
    {                
        $response = $this->getJson('/api/move-account-balance/889955-1/50000000/sacar');
        $response->assertStatus(400);
    }

    public function testPuttingMoney()
    {                
        $response = $this->getJson('/api/move-account-balance/889955-1/100/depositar');
        $response->assertStatus(200);
    }

    public function testMoveValidation()
    {                
        $response = $this->getJson('/api/move-account-balance/889955-1/5000.11/other');
        $response->assertStatus(400);
    }

    public function testInvalidAccountInDatabase()
    {                
        $response = $this->getJson('/api/move-account-balance/neverused-1/5000/depositar');
        $response->assertStatus(400);
    }
    
}
