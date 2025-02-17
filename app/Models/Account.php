<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;

class Account extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['agency_id', 'user_id', 'number', 'balance'];

    public function agency()
    {
        return $this->hasOne('App\Models\Agency', 'id', 'agency_id');
    }

    public static function validate($params)
    {
        $errors = [];
        
        $validator = Validator::make($params, [
            'account'     => 'required',
            'amountMoney' => 'required|numeric',
            'moveType'    => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
        }        

        if(isset($params['moveType']) && (strtolower($params['moveType']) != 'sacar' && strtolower($params['moveType']) != 'depositar')){
            array_push($errors,__('account.moveTypeInformedFailed'));            
        }

        if(!empty($errors)){
            return [
                'status' => false,
                'errors'  => $errors
            ];
        }

        return true;
    }
}
