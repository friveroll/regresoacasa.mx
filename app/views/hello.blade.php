<!doctype html>
<html lang="en" class="fuelux">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="{{asset('assets/css/fuelux.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/fuelux-responsive.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/font-awesome.css')}}">
	<link href='http://fonts.googleapis.com/css?family=Croissant+One|Muli:300|Open+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="{{asset('assets/less/main.css')}}">
	<title>Document</title>
</head>
<body>
@include('top-menu')
	
<!-- Container -->
<div class="container" style="padding-top: 25px;">
    <!-- Notifications -->
    @include('notifications')
    <!-- ./ notifications -->
    <div class="well">
        <h1>Registro</h1>
        <div id="MyWizard" class="wizard">
            <ul class="steps">
                <li data-target="#step1" class="active"><span class="badge badge-info">1</span>Información Básica<span class="chevron"></span></li>
                <li data-target="#step2"><span class="badge">2</span>Información del Prefil<span class="chevron"></span></li>
                <li data-target="#step3"><span class="badge">3</span>Avtar<span class="chevron"></span></li>
            </ul>
            <div class="actions">
                <button class="btn btn-mini btn-prev"> <i class="icon-arrow-left"></i>Anterior</button>
                <button class="btn btn-mini btn-next" data-last="Terminar">Siguiente<i class="icon-arrow-right"></i></button>
            </div>
        </div> <!-- ./MyWizard-->
        
        <div class="step-content">
            <fieldset>
                {{ Form::open(array('id' => 'registro',  'class'=>"form-horizontal")) }}
                <div class="step-pane active" id="step1">
                        <div id="legend">
                          <legend class="">Datos de acceso</legend>
                        </div>
                        <div class="control-group {{ ($errors->has('username')) ? 'error' : '' }}" for='username'>
                            {{ Form::label('username', 'Usuario', array('class'=>"control-label"))}}  
                            <div class="controls">
                                <input type="text" id="username" name="username" placeholder="" class="input-xlarge">
                                <p class="help-block">{{ $errors->first('username') }}</p>
                            </div>
                        </div>

                        <div class="control-group {{ ($errors->has('first_name')) ? 'error' : '' }}" for='first_name'>
                            {{ Form::label('first_name', 'Nombre:', array('class'=>"control-label")) }} 
                            <div class="controls">
                                <input type="text" id="first_name" name="first_name" placeholder="" class="input-xlarge">
                                <p class="help-block">{{ $errors->first('first_name')  }}</p>
                            </div>
                        </div>

                        <div class="control-group {{ ($errors->has('last_name')) ? 'error' : '' }}" for='last_name'>
                            {{ Form::label('last_name', 'Apellido', array('class'=>"control-label"))}}
                            <div class="controls">
                                <input type="text" id="last_name" name="last_name" placeholder="" class="input-xlarge">
                                <p class="help-block">{{ $errors->first('last_name')  }}</p>
                            </div>
                        </div>

                        <div class="control-group {{ ($errors->has('email')) ? 'error' : '' }}" for='email'>
                            {{ Form::label('email', 'Correo electr&oacute;nico', array('class'=>"control-label"))}}
                            <div class="controls">
                                <input type="text" id="email" name="email" placeholder="" class="input-xlarge">
                                <p class="help-block">{{ $errors->first('email')  }}</p>
                            </div>
                        </div>

                        <div class="control-group {{ ($errors->has('password')) ? 'error' : '' }}" for='password'>
                            {{ Form::label('password', 'Contrase&ntilde;a', array('class'=>"control-label"))}}
                            <div class="controls">
                                <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
                                <p class="help-block">{{ $errors->first('password')  }}</p>
                            </div>
                        </div>
                        
                        <div class="control-group {{ ($errors->has('password_confirmation')) ? 'error' : '' }}" for='password_confirmation'>
                            {{ Form::label('password_confirmation', 'Confirme la contrase&ntilde;a', array('class'=>"control-label"))}}
                            <div class="controls">
                                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="" class="input-xlarge">
                                <p class="help-block">{{ $errors->first('password_confirmation') }}
                            </div>
                        </div>
                </div> <!-- ./step1 -->  
                <div class="step-pane" id="step2">

                    <div id="legend">
                      <legend class="">Datos del Perfil</legend>
                    </div>

                    <div class="control-group {{ ($errors->has('birthday')) ? 'error' : '' }}" for='birthday'>
                        {{ Form::label('birthday', 'Cumplea&ntilde;os', array('class'=>"control-label"))}}
                        <div class="controls">
                            <input type="text" id="birthday" name="birthday" placeholder="" class="input-xlarge">
                            <p class="help-block">{{ $errors->first('birthday') }}</p>
                        </div>
                    </div>

                    <div class="control-group {{ ($errors->has('country_id')) ? 'error' : '' }}" for='country_id'>
                        {{ Form::label('country_id', 'Pa&iacute;s', array('class'=>"control-label"))}}
                        <div class="controls"> 
                            {{ Form::select("country_id", array("AF"=>"Afganistán",
                                                                "AL"=>"Albania",
                                                                "DE"=>"Alemania",
                                                                "AD"=>"Andorra",
                                                                "AO"=>"Angola",
                                                                "AI"=>"Anguilla",
                                                                "AQ"=>"Antártida",
                                                                "AG"=>"Antigua y Barbuda",
                                                                "AN"=>"Antillas Holandesas",
                                                                "SA"=>"Arabia Saud&iacute;",
                                                                "DZ"=>"Argelia",
                                                                "AR"=>"Argentina",
                                                                "AM"=>"Armenia",
                                                                "AW"=>"Aruba",
                                                                "AU"=>"Australia",
                                                                "AT"=>"Austria",
                                                                "AZ"=>"Azerbaiyán",
                                                                "BS"=>"Bahamas",
                                                                "BH"=>"Bahrein",
                                                                "BD"=>"Bangladesh",
                                                                "BB"=>"Barbados",
                                                                "BE"=>"Bélgica",
                                                                "BZ"=>"Belice",
                                                                "BJ"=>"Benin",
                                                                "BM"=>"Bermudas",
                                                                "BY"=>"Bielorrusia",
                                                                "MM"=>"Birmania",
                                                                "BO"=>"Bolivia",
                                                                "BA"=>"Bosnia y Herzegovina",
                                                                "BW"=>"Botswana",
                                                                "BR"=>"Brasil",
                                                                "BN"=>"Brunei",
                                                                "BG"=>"Bulgaria",
                                                                "BF"=>"Burkina Faso",
                                                                "BI"=>"Burundi",
                                                                "BT"=>"Bután",
                                                                "CV"=>"Cabo Verde",
                                                                "KH"=>"Camboya",
                                                                "CM"=>"Camerún",
                                                                "CA"=>"Canadá",
                                                                "TD"=>"Chad",
                                                                "CL"=>"Chile",
                                                                "CN"=>"China",
                                                                "CY"=>"Chipre",
                                                                "VA"=>"Ciudad del Vaticano (Santa Sede)",
                                                                "CO"=>"Colombia",
                                                                "KM"=>"Comores",
                                                                "CG"=>"Congo",
                                                                "CD"=>"Congo, República Democrática del",
                                                                "KR"=>"Corea",
                                                                "KP"=>"Corea del Norte",
                                                                "CI"=>"Costa de Marf&iacute;l",
                                                                "CR"=>"Costa Rica",
                                                                "HR"=>"Croacia (Hrvatska)",
                                                                "CU"=>"Cuba",
                                                                "DK"=>"Dinamarca",
                                                                "DJ"=>"Djibouti",
                                                                "DM"=>"Dominica",
                                                                "EC"=>"Ecuador",
                                                                "EG"=>"Egipto",
                                                                "SV"=>"El Salvador",
                                                                "AE"=>"Emiratos Árabes Unidos",
                                                                "ER"=>"Eritrea",
                                                                "SI"=>"Eslovenia",
                                                                "ES"=>"Espa&ntilde;a",
                                                                "US"=>"Estados Unidos",
                                                                "EE"=>"Estonia",
                                                                "ET"=>"Etiop&iacute;a",
                                                                "FJ"=>"Fiji",
                                                                "PH"=>"Filipinas",
                                                                "FI"=>"Finlandia",
                                                                "FR"=>"Francia",
                                                                "GA"=>"Gab&oacute;n",
                                                                "GM"=>"Gambia",
                                                                "GE"=>"Georgia",
                                                                "GH"=>"Ghana",
                                                                "GI"=>"Gibraltar",
                                                                "GD"=>"Granada",
                                                                "GR"=>"Grecia",
                                                                "GL"=>"Groenlandia",
                                                                "GP"=>"Guadalupe",
                                                                "GU"=>"Guam",
                                                                "GT"=>"Guatemala",
                                                                "GY"=>"Guayana",
                                                                "GF"=>"Guayana Francesa",
                                                                "GN"=>"Guinea",
                                                                "GQ"=>"Guinea Ecuatorial",
                                                                "GW"=>"Guinea-Bissau",
                                                                "HT"=>"Hait&iacute;",
                                                                "HN"=>"Honduras",
                                                                "HU"=>"Hungr&iacute;a",
                                                                "IN"=>"India",
                                                                "ID"=>"Indonesia",
                                                                "IQ"=>"Irak",
                                                                "IR"=>"Irán",
                                                                "IE"=>"Irlanda",
                                                                "BV"=>"Isla Bouvet",
                                                                "CX"=>"Isla de Christmas",
                                                                "IS"=>"Islandia",
                                                                "KY"=>"Islas Caimán",
                                                                "CK"=>"Islas Cook",
                                                                "CC"=>"Islas de Cocos o Keeling",
                                                                "FO"=>"Islas Faroe",
                                                                "HM"=>"Islas Heard y McDonald",
                                                                "FK"=>"Islas Malvinas",
                                                                "MP"=>"Islas Marianas del Norte",
                                                                "MH"=>"Islas Marshall",
                                                                "UM"=>"Islas menores de Estados Unidos",
                                                                "PW"=>"Islas Palau",
                                                                "SB"=>"Islas Salom&oacute;n",
                                                                "SJ"=>"Islas Svalbard y Jan Mayen",
                                                                "TK"=>"Islas Tokelau",
                                                                "TC"=>"Islas Turks y Caicos",
                                                                "VI"=>"Islas V&iacute;rgenes (EE.UU.)",
                                                                "VG"=>"Islas V&iacute;rgenes (Reino Unido)",
                                                                "WF"=>"Islas Wallis y Futuna",
                                                                "IL"=>"Israel",
                                                                "IT"=>"Italia",
                                                                "JM"=>"Jamaica",
                                                                "JP"=>"Jap&oacute;n",
                                                                "JO"=>"Jordania",
                                                                "KZ"=>"Kazajistán",
                                                                "KE"=>"Kenia",
                                                                "KG"=>"Kirguizistán",
                                                                "KI"=>"Kiribati",
                                                                "KW"=>"Kuwait",
                                                                "LA"=>"Laos",
                                                                "LS"=>"Lesotho",
                                                                "LV"=>"Letonia",
                                                                "LB"=>"L&iacute;bano",
                                                                "LR"=>"Liberia",
                                                                "LY"=>"Libia",
                                                                "LI"=>"Liechtenstein",
                                                                "LT"=>"Lituania",
                                                                "LU"=>"Luxemburgo",
                                                                "MK"=>"Macedonia, Ex-República Yugoslava de",
                                                                "MG"=>"Madagascar",
                                                                "MY"=>"Malasia",
                                                                "MW"=>"Malawi",
                                                                "MV"=>"Maldivas",
                                                                "ML"=>"Mal&iacute;",
                                                                "MT"=>"Malta",
                                                                "MA"=>"Marruecos",
                                                                "MQ"=>"Martinica",
                                                                "MU"=>"Mauricio",
                                                                "MR"=>"Mauritania",
                                                                "YT"=>"Mayotte",
                                                                "MX"=>"México",
                                                                "FM"=>"Micronesia",
                                                                "MD"=>"Moldavia",
                                                                "MC"=>"M&oacute;naco",
                                                                "MN"=>"Mongolia",
                                                                "MS"=>"Montserrat",
                                                                "MZ"=>"Mozambique",
                                                                "NA"=>"Namibia",
                                                                "NR"=>"Nauru",
                                                                "NP"=>"Nepal",
                                                                "NI"=>"Nicaragua",
                                                                "NE"=>"N&iacute;ger",
                                                                "NG"=>"Nigeria",
                                                                "NU"=>"Niue",
                                                                "NF"=>"Norfolk",
                                                                "NO"=>"Noruega",
                                                                "NC"=>"Nueva Caledonia",
                                                                "NZ"=>"Nueva Zelanda",
                                                                "OM"=>"Omán",
                                                                "NL"=>"Pa&iacute;ses Bajos",
                                                                "PA"=>"Panamá",
                                                                "PG"=>"Papúa Nueva Guinea",
                                                                "PK"=>"Paquistán",
                                                                "PY"=>"Paraguay",
                                                                "PE"=>"Perú",
                                                                "PN"=>"Pitcairn",
                                                                "PF"=>"Polinesia Francesa",
                                                                "PL"=>"Polonia",
                                                                "PT"=>"Portugal",
                                                                "PR"=>"Puerto Rico",
                                                                "QA"=>"Qatar",
                                                                "UK"=>"Reino Unido",
                                                                "CF"=>"República Centroafricana",
                                                                "CZ"=>"República Checa",
                                                                "ZA"=>"República de Sudáfrica",
                                                                "DO"=>"República Dominicana",
                                                                "SK"=>"República Eslovaca",
                                                                "RE"=>"Reuni&oacute;n",
                                                                "RW"=>"Ruanda",
                                                                "RO"=>"Rumania",
                                                                "RU"=>"Rusia",
                                                                "EH"=>"Sahara Occidental",
                                                                "KN"=>"Saint Kitts y Nevis",
                                                                "WS"=>"Samoa",
                                                                "AS"=>"Samoa Americana",
                                                                "SM"=>"San Marino",
                                                                "VC"=>"San Vicente y Granadinas",
                                                                "SH"=>"Santa Helena",
                                                                "LC"=>"Santa Luc&iacute;a",
                                                                "ST"=>"Santo Tomé y Pr&iacute;ncipe",
                                                                "SN"=>"Senegal",
                                                                "SC"=>"Seychelles",
                                                                "SL"=>"Sierra Leona",
                                                                "SG"=>"Singapur",
                                                                "SY"=>"Siria",
                                                                "SO"=>"Somalia",
                                                                "LK"=>"Sri Lanka",
                                                                "PM"=>"St. Pierre y Miquelon",
                                                                "SZ"=>"Suazilandia",
                                                                "SD"=>"Sudán",
                                                                "SE"=>"Suecia",
                                                                "CH"=>"Suiza",
                                                                "SR"=>"Surinam",
                                                                "TH"=>"Tailandia",
                                                                "TW"=>"Taiwán",
                                                                "TZ"=>"Tanzania",
                                                                "TJ"=>"Tayikistán",
                                                                "TF"=>"Territorios franceses del Sur",
                                                                "TP"=>"Timor Oriental",
                                                                "TG"=>"Togo",
                                                                "TO"=>"Tonga",
                                                                "TT"=>"Trinidad y Tobago",
                                                                "TN"=>"Túnez",
                                                                "TM"=>"Turkmenistán",
                                                                "TR"=>"Turqu&iacute;a",
                                                                "TV"=>"Tuvalu",
                                                                "UA"=>"Ucrania",
                                                                "UG"=>"Uganda",
                                                                "UY"=>"Uruguay",
                                                                "UZ"=>"Uzbekistán",
                                                                "VU"=>"Vanuatu",
                                                                "VE"=>"Venezuela",
                                                                "VN"=>"Vietnam",
                                                                "YE"=>"Yemen",
                                                                "YU"=>"Yugoslavia",
                                                                "ZM"=>"Zambia",
                                                                "ZW"=>"Zimbabue",
                                                                ), 'MX')}}
                        </div>
                    </div>

                    <div class="control-group {{ ($errors->has('sexo')) ? 'error' : '' }}" for='sexo'>
                        {{ Form::label('sexo', 'Sexo', array('class'=>"control-label"))}} 
                        <div class="controls">
                            {{ Form::select('sexo', array('M' => 'Hombre', 'F' => 'Mujer')) }} 
                            <p class="help-block">{{ $errors->first('sexo') }}</p>       
                        </div>
                    </div>         

                   <div class="control-group {{ ($errors->has('sexo')) ? 'error' : '' }}" for='sexo'>
                        {{ Form::label('estado_de_vida_id', 'Estado de Vida', array('class'=>"control-label")) }} 
                        <div class="controls">
                        {{ Form::select('estado_de_vida_id', array('1' => 'Soltero','2' => 'Casado')) }}
                        <p class="help-block">{{ $errors->first('estado_de_vida_id') }}</p>
                        </div>
                    </div>

                    <div class="control-group {{ ($errors->has('biografia')) ? 'error' : '' }}" for='biografia'>
                        {{ Form::label('biografia', 'Biografía', array('class'=>"control-label")) }}
                        <div class="controls">
                            <textarea id="biografia" name="biografia" type="text" rows="5" cols="20"></textarea>
                            <p class="help-block">{{ $errors->first('biografia') }}</p>
                        </div>
                    </div>
                </div> <!-- ./step2 -->
                <div class="step-pane" id="step3">
                    <div id="legend">
                        <legend class="">Suba una imagen</legend>
                    </div>
                    <div class="controls">
                      <button class="btn btn-success">Registro</button>
                    </div>
                </div> <!-- ./step3 -->
                {{ Form::token() . Form::close() }}
            </fieldset>
        </div> <!-- ./step-content -->
    </div>
</div>

<!-- ./ container -->





	<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

	<script type="text/javascript" src="{{asset('assets/js/loader.js')}}"></script>
</body>
</html>

