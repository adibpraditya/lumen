<?php namespace App\Http;

class Validator extends \Illuminate\Support\Facades\Validator {

    public function validateJsonObjectMin($attribute, $values, $parameters)
    {
    	$this->requireParameterCount(1, $parameters, 'json_object');
		$val = json_decode($values);

		return is_object($val);
    }
}
