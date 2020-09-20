<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class AccountController extends Controller
{

    public function showCostumerBalance($accountNumber)
    {
        try {            
            $balance = Account::with(['agency'])->where('number', $accountNumber)->first()->balance;
            return Response::json(['status' => true, 'message' => __('account.checkSuccess'), 'data' => ['balance' => $balance]], 200);
        } catch (\Throwable $th) {            
            return Response::json(['status' => true, 'message' => __('account.checkFailed'), 'data' => []], 400);
        }
        
    }

}
