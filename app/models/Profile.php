<?php

class Profile extends Eloquent {

	protected $table = 'profiles';

	protected $fillable = array('birthday', 'country_id', 'sexo', 'estado_de_vida_id', 'biografia', 'avtar_file_name');

	public function user()
	{
		return $this->belongsTo('User');
	}

}