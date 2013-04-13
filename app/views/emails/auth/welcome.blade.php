<!DOCTYPE html>
<html lang="es-MX">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Bienvenido a Regreso a Casa</h2>

		<p><b>Cuenta:</b> {{{ $email }}}</p>
		<p>Para activar tu cuenta, <a href="{{  URL::to('usuario/activacion', array('id' => $userId, urlencode($activationCode))) }}">visita este enlace.</a></p>
		<p>O dirige tu navegador hacia esta direcci&oacute;n: <br /> {{ URL::to('usuario/activacion', array('id' => $userId, urlencode($activationCode))) }}</p>
		<p>Gracias.</p>
	</body>
</html>