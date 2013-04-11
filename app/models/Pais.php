<?php

class Pais extends Eloquent {

	protected $table = 'paises';

	public static function paisById($country = null)
	{
		return DB::table('paises')->where('country_id', '=', $country)->pluck('country');
	}
}