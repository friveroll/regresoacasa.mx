@extends('layouts.master')

@section('titulo')
	Ingreso | Regreso a Casa
@stop

@section('contenido')
	<div id="ingreso">
		{{ Form::open(array('id' => 'ingreso',  'class'=>"form-horizontal")) }}
			<div class="control-group {{ ($errors->has('email')) ? 'error' : '' }}" for='email'>
			    {{ Form::label('email', 'Correo electronico: ', array('class'=>"control-label"))}}  
			    <div class="controls">
			        <input type="text" id="email" name="email" placeholder="Correo" class="input-xlarge">
			        <p class="help-block">{{ $errors->first('email') }}</p>
			    </div>
			</div>
			<div class="control-group {{ ($errors->has('password')) ? 'error' : '' }}" for='password'>
			    {{ Form::label('password', 'Contrase&ntilde;a', array('class'=>"control-label"))}}
			    <div class="controls">
			        <input type="password" id="password" name="password" placeholder="Contraseña" class="input-xlarge">
			        <p class="help-block">{{ $errors->first('password')  }}</p>
			    </div>
			</div>
			<div class="control-group" for"rememberme">
			    <div class="controls">
			        <label class="checkbox inline">
			            <input type="checkbox" name="rememberMe" value="1"> Recordar contraseña
			        </label>
			    </div>
			</div>
			
			<div class="form-actions">
			    <input class="btn btn-primary" type="submit" value="Log In"> 
			    <a href="/users/resetpassword" class="btn btn-link">¿Olvidó su contraseña?</a>
			</div>
		{{ Form::token() . Form::close() }}

	</div>
@stop