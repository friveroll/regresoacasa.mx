<?php

class UserController extends BaseController {

	public function __construct()
	{
		$this->beforeFilter('csrf', array('on' => 'post'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getNuevo()
	{
		return View::make('users.register');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postNuevo()
	{
		//Response::json(Input::all());
		

		$input = array('username' => Input::get('username'),
		               'first_name' => Input::get('first_name'),
		               'last_name' => Input::get('last_name'),
		               'email' => Input::get('email'),
		               'password' => Input::get('password'),
		               'password_confirmation' => Input::get('password_confirmation'),
		               'birthday' => Input::get('birthday'),
		               'country_id' => Input::get('country_id'),
		               'sexo' => Input::get('sexo'),
		               'estado_de_vida_id' => Input::get('estado_de_vida_id'),
		               'biografia' => Input::get('biografia'),
		               'avtar_file_name' => Input::get('avtar_file_name'),
		              );

		$this->profile = new Profile(array('birthday' => $input['birthday'],
		                                   'country_id' => $input['country_id'],
		                                   'sexo' => $input['sexo'],
		                                   'estado_de_vida_id' => $input['estado_de_vida_id'],
		                                   'biografia' => $input['biografia'],
		                                   'avtar_file_name' => $input['avtar_file_name'],
		                                 ));

		$rules = array('first_name' => 'required|min:4|max:24',
		               'last_name' => 'required|min:4|max:24',
		               'username' => 'required|unique:users|min:4|max:10',
		               'email' => 'required|min:4|max:32|email',
		               'password' => 'required|min:6|confirmed',
		               'password_confirmation' => 'required',
		               'birthday' => 'date|required',
		               'country_id' => 'required|min:2|max:2|alpha',
		               'sexo' => 'required|in:M,F',
		               //'biografia' => 'required',
		               //'avtar_file_name' =>'required'
		               );

		$v = Validator::make($input, $rules);

		if ($v->fails($input))
		{
		    // Validation has failed
		    return Redirect::to('usuario/nuevo')
		        ->withErrors($v)
		        ->withInput($input);
		} else {
			$ip = ip2long(Request::getClientIp());

			$user = new User(array('username' => $input['username'],
                                   'first_name' => $input['first_name'],
                                   'last_name' => $input['last_name'],
                                   'email' => $input['email'],
                                   'password' => $input['password'],
                                   'registro_IP' => $ip,
                                   'last_IP' => $ip
                                   ));
 			$user->save();
			
			$this->profile->user_id = $user->getID();
			$this->profile->save();

			
			//Get the activation code & prep data for email
			$data['activationCode'] = $user->GetActivationCode();
			$data['email'] = $input['email'];
			$data['userId'] = $user->getId();

			//send email with link to activate.
			Mail::send('emails.auth.welcome', $data, function($m) use($data)
			{
			    $m->to($data['email'])->subject('Bienvenido a Regreso a Casa');
			});

			//success!
	    	Session::flash('success', 'Su cuenta ha sido creada revise su correo, para el link de confirmaci&oacute;n.');
	    	return Redirect::to('/');
		}

	}

	public function getActivacion($userId, $activationCode)
	{
		//$user = Sentry::getUserProvider()->findById($userId);
		try{
			$user = User::find($userId);
		    
		    if ($user->attemptActivation($activationCode))
		    {
		        // User activation passed
		        
		    	//Add this person to the user group.
		    	 
		    	$this->rol = new RolUsuario(array('user_id' => $userId,
		    				                'role_id' => 2 ));
		    	$this->rol->save();


		        Session::flash('success', 'Su cuenta ha sido activada. <a href="/usuario/ingresar">Entrar</a>.');
				return Redirect::to('/');
		    }
		    else
		    {
		        // User activation failed
		        Session::flash('error', 'Existe un problema de activaci&oacute;n con su cuenta. Por favor contacte al administrador.');
				    return Redirect::to('/');
		    }
	    }
	    catch (UserAlreadyActivatedException $e)
	    {
	    	Session::flash('error', 'Su cuenta ya ha sido activada');
	    	return Redirect::to('/');
	    }

	}

	public function postEntrar()
	{
		$input = array('email' => Input::get('email'),
                   'password' => Input::get('password'));

    $rules = array ('email' => 'required|min:4|max:32|email',
                    'password' => 'required|min:6');

    $v = Validator::make($input, $rules);

    if ($v->fails())
    {
      // Validation has failed
      return Redirect::to('usuario/entrar')->withErrors($v)->withInput();
    } else{
      try
      {
        Auth::attempt($input,  Input::get('rememberMe'));
      }
      catch (\Toddish\Verify\UserDeletedException $e)
      {
        Session::flash('error', 'Usted ha sido expulsado, contacte al Administrador');
        return Redirect::to('/');
      }
      catch (\Toddish\Verify\UserDisabledException $e)
      {
        Session::flash('error', 'Usted ha sido suspendido, contacte al Administrador');
        return Redirect::to('/');
      }
      catch (\Toddish\Verify\UserUnverifiedException $e)
      {
        Session::flash('error', 'Su cuenta no ha sido verificada, revise su correo para el link de verificacion');
        return Redirect::to('/');
      }
      catch (\Toddish\Verify\UserNotFoundException $e)
      {
        Session::flash('error', 'El usuario no existe, registrese rellenando el formulario');
        return Redirect::to('usuario/nuevo')
          ->withInput($input);
      }
      catch (\Toddish\Verify\UserPasswordIncorrectException $e)
      {
        Session::flash('error', 'Contraseña incorrecta');
        return Redirect::to('usuario/entrar')
            ->withInput($input);
      }
      $nombre = Auth::user()->first_name . " " . Auth::user()->last_name;
      Session::flash('success', 'Bienvenido ' . $nombre);
      return Redirect::to('/');
    }

	}

	public function getEntrar()
	{
    return View::make('users.entrar');
	}

	public function getExiste($username = null)
	{
		if (Request::ajax())
		{
    		if (User::username($username) == $username)
    		{
				$exists = true;
			} else {
				$exists = false;
			}
			return Response::json($exists);
		} else {
			Session::flash('error', 'Operacion no permitida');
			return Redirect::to('/');
		}
	}

	public function getSalir($value='')
  {
    Auth::logout();
    Session::flash('info', 'Ha salido del sitio');
    return Redirect::to('/');
  }

  public function getPerfil($username = null)
	{
			$user = new User;

			$perfiles = $user->perfil($username);

			$estado_de_vida = array('1' => 'Soltero','2' => 'Casado', '3' => 'Religioso');

			$pais = new Pais;

			//return Response::json($perfiles);
			//return var_dump($perfiles);
			return View::make('users.perfil', compact('perfiles', 'estado_de_vida', 'pais'));

	}



}				