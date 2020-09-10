<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MerchantCardInventory extends Model
{
    protected $primaryKey = 'card_number';
    protected $table = 'merchant_card_inventory';
}