<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{

    public function showCostumerBalance($accountNumber)
    {
        try {            
            $balance = Account::with(['agency'])->where('number', $accountNumber)->first()->balance;
            return Response::json(['status' => true, 'message' => __('account.checkSuccess'), 'data' => ['balance' => $balance]], 200);
        } catch (\Throwable $th) {            
            return Response::json(['status' => false, 'message' => __('account.checkFailed'), 'data' => []], 400);
        }        
    }

    public function getMoneyFromTheAccountBalance($accountNumber, $amountMoney)
    {
        $toValidate = [
            'account'     => $accountNumber,
            'amountMoney' => $amountMoney
        ];

        $validation = Account::validate($toValidate);

        if (isset($validation['status'])) {
            return Response::json(['status' => true, 'message' => __('account.validateFailed'), 'data' => $validation['errors']], 400);            
        }

        DB::beginTransaction();

        try {            
            $account = Account::with(['agency'])->where('number', $accountNumber)->first();
            
            if($account->balance >= $amountMoney){
                $account->balance = $account->balance - $amountMoney;
                $account->update();                
                DB::commit();
                return Response::json(['status' => true, 'message' => __('account.getMoneySuccess'), 'data' => ['balance' => $account->balance]], 200);
            }                   
                 
            DB::rollback();
            return Response::json(['status' => false, 'message' => __('account.balanceLessFailed'), 'data' => ['balance' => $account->balance]], 200);

        } catch (\Throwable $th) {  
            DB::rollback();                
            return Response::json(['status' => false, 'message' => __('account.movimentationFailed'), 'data' => []], 400);
        }        
    }

}
