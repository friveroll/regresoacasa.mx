<?php

use Toddish\Verify\Models\User as VerifyUser;

class User extends VerifyUser
{
	
    protected $fillable = array('username',
                                'first_name',
                                'last_name', 
    	                        'password', 
    	                        'salt',
    	                        'email',
    	                        'verified',
    	                        'deleted',
    	                        'disabled',
    	                        'registro_IP',
    	                        'last_IP');

  	public function profile()
	{
		return $this->hasOne('Profile');
	}

	public function getID()
	{
	    return $this->getKey();
	}

	public static function getByUsername($username)
	{
		try
		{
			return DB::table('users')->where('username', $username)->first();
		}
		catch (UserDoesNotExistException $e)
		{
			Session::flash('error', 'El usuario no existe');
	    	return Redirect::to('/');
		}
	}

	public static function getUsernameID($username)
	{
		try
		{
			$id = DB::table('users')->where('username', $username)->pluck('id');
			return $id;
		}
		catch (UserDoesNotExistException $e)
		{
			Session::flash('error', 'El usuario no existe');
	    	return Redirect::to('/');
		}
	}

	/**
	 * Generate a random string. If your server has
	 * @return string
	 */
	public function getRandomString($length = 42)
	{
		// We'll check if the user has OpenSSL installed with PHP. If they do
		// we'll use a better method of getting a random string. Otherwise, we'll
		// fallback to a reasonably reliable method.
		if (function_exists('openssl_random_pseudo_bytes'))
		{
			// We generate twice as many bytes here because we want to ensure we have
			// enough after we base64 encode it to get the length we need because we
			// take out the "/", "+", and "=" characters.
			$bytes = openssl_random_pseudo_bytes($length * 2);

			// We want to stop execution if the key fails because, well, that is bad.
			if ($bytes === false)
			{
				throw new \RuntimeException('Unable to generate random string.');
			}

			return substr(str_replace(array('/', '+', '='), '', base64_encode($bytes)), 0, $length);
		}

		$pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

		return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
	}

	public function getActivationCode()
	{
		$this->activation_code = $activationCode = $this->getRandomString();

		$this->save();

		return $activationCode;
	}

	/**
	 * Attempts to activate the given user by checking
	 * the activate code. If the user is activated already,
	 * an Exception is thrown.
	 *
	 * @param  string  $activationCode
	 * @return bool
	 * @throws Cartalyst\Sentry\Users\UserAlreadyActivatedException
	 */
	public function attemptActivation($activationCode)
	{
		if ($this->verified == 1)
		{
			throw new UserAlreadyActivatedException('Su cuenta ya ha sido activada.');
		}

		if ($activationCode == $this->activation_code)
		{
			$this->activation_code = null;
			$this->verified = 1;
			return $this->save();
		}

		return false;
	}

	public function setLastIP()
	{
		$this->last_IP = ip2long(Request::getClientIp());
		$this->save();
	}

	public static function username($username)
	{
		return static::where('username','=', $username)->pluck('username');
	}

	public static function perfil($username)
	{
		return DB::table('users')
							->join('profiles', 'users.id', '=', 'profiles.user_id')
							->where('username','=', $username)
							->get(array("username",
								        "first_name",
								        "last_name",
								        "email", 
								        "birthday", 
								        "country_id",
								        "sexo", 
								        "estado_de_vida_id", 
								        "biografia",
								        "avtar_file_name",
								        "created_at",
								        "updated_at" ));
	}

	public function date()
	{
		return ExpressiveDate::make($this->created_at)->getRelativeDate();
	}

}

class UserAlreadyActivatedException extends Exception {};
class UserDoesNotExistException extends Exception {};