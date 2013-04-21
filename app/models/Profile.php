<?php

class Profile extends Eloquent {

	protected $table = 'profiles';

	public $timestamps= false;

	protected $fillable = array('birthday', 'country_id', 'sexo', 'estado_de_vida_id', 'biografia', 'avtar_file_name');

	public function user()
	{
		return $this->belongsTo('User', 'user_id');
	}

  public function pais()
  {
    return $this->belongsTo('Pais', 'country_id');
  }
}
