<?php

namespace Tests\Unit\App\Model;

use Tests\TestCase;

use App\Models\Account;

class AccountTest extends TestCase
{

    public function invalidAccountDataProvider(){
        return [
            [
                [
                    'account'     => '',
                    'amountMoney' => '10a',
                    'moveType'    => 'sacarW',
                ]
            ],
            [
                [
                    'account'     => '123',
                    'amountMoney' => '10',
                    'moveType'    => 'sacarW',
                ]
            ],
        ];
    }

    /**
     * A basic unit test example.
     * @test
     * @dataProvider invalidAccountDataProvider
     * @return void
     */
    public function testValidateInvalidDataGivenShouldReturnArray($params)
    {
        $account = new Account();
        $this->assertIsArray($account->validate($params));
    }
    
}
