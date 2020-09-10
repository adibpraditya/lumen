<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NewInventoryParameters extends Model
{
	protected $guarded=[];
	public $timestamps = false;
    protected $table = 'new_inventory_parameters';
}