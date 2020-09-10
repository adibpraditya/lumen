<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MerchantCardRequest extends Model
{
    protected $guarded = ['id'];

    public function details()
    {
        return $this->hasMany('App\Model\MerchantCardRequestDetail', 'merchant_card_request_id');
    }
}