<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['agency_id', 'user_id', 'number', 'balance'];

    public function agency()
    {
        return $this->hasOne('App\Models\Agency', 'id', 'agency_id');
    }
}
