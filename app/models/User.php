<?php

use Toddish\Verify\Models\User as VerifyUser;

class User extends VerifyUser
{
	
    protected $fillable = array('username', 
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
}