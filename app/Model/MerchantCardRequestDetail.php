<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MerchantCardRequestDetail extends Model
{
    protected $guarded = ['id'];

    public function request()
	{
		return $this->belongsTo('App\Model\MerchantCardRequest', 'merchant_card_request_id');
	}
}