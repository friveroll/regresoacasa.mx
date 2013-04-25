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

  public function avtar_url()
  {
    if($filename = $this->avtar_file_name){
      return URL::to($filename);
    } else {
      return URL::to('img/default-avtar.png');
    }
  }

  public function avtar_path()
  {
    return path('public').'/assets/img/profiles/'.$filename;
  }

  public function delete_avatar()
  {
    if($this->avtar_file_name){
      File::delete($this->avtar_path());
      $this->avtar_file_name = null;
      $this->save();
      return true;
    }
  }
}
