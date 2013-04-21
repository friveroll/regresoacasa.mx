<?php

class Pais extends Eloquent {

  protected $table = 'paises';

  public function getId()
  {
    return $this->country_id;
  }

  public function getCountry()
  {
    return $this->country;
  }

  public function profile()
  {
    return $this->hasOne('Profile');
  }

  public static function paisById($country_id = null)
  {
    return static::where('country_id', '=', $country_id)->pluck('country');
  }

}
