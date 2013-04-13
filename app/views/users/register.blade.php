<!doctype html>
<html lang="en" class="fuelux">
<head>
	<meta charset="UTF-8">
    {{ Html::style('assets/css/fuelux.css') }}
	{{ Html::style('assets/css/fuelux-responsive.min.css')}}
	{{ Html::style('assets/css/font-awesome.css')}}
	{{ Html::style('assets/css/main.css')}}
    {{ Html::style('assets/css/datepicker.css') }}
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
                                <input type="text" id="username" name="username" value="{{ Request::old('username') }}" placeholder="" class="input-xlarge">
                                <p class="help-block">{{ $errors->first('username') }}</p>
                            </div>
                        </div>

                        <div class="control-group {{ ($errors->has('first_name')) ? 'error' : '' }}" for='first_name'>
                            {{ Form::label('first_name', 'Nombre:', array('class'=>"control-label")) }} 
                            <div class="controls">
                                <input type="text" id="first_name" name="first_name" value="{{ Request::old('first_name') }}" placeholder="" class="input-xlarge">
                                <p class="help-block">{{ $errors->first('first_name')  }}</p>
                            </div>
                        </div>

                        <div class="control-group {{ ($errors->has('last_name')) ? 'error' : '' }}" for='last_name'>
                            {{ Form::label('last_name', 'Apellido', array('class'=>"control-label"))}}
                            <div class="controls">
                                <input type="text" id="last_name" name="last_name" value="{{ Request::old('last_name') }}" placeholder="" class="input-xlarge">
                                <p class="help-block">{{ $errors->first('last_name')  }}</p>
                            </div>
                        </div>

                        <div class="control-group {{ ($errors->has('email')) ? 'error' : '' }}" for='email'>
                            {{ Form::label('email', 'Correo electr&oacute;nico', array('class'=>"control-label"))}}
                            <div class="controls">
                                <input type="text" id="email" name="email" value="{{ Request::old('email') }}" placeholder="" class="input-xlarge">
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
                        {{ Form::label('birthday', 'Fecha de nacimiento', array('class'=>"control-label"))}}
                        <div class="controls">
                            <div class="date input-prepend" id="dpYears" data-date-format="yyyy-mm-dd" data-date-viewmode="years">   
                                <span class="add-on"><i class="icon-calendar"></i></span>
                                <input type="text" id="birthday" name="birthday" value="{{ Request::old('birthday') }}" placeholder="YYYY-MM-DD" class="input-xlarge">
                            </div>
                            <p class="help-block">{{ $errors->first('birthday', '<span class="help-inline">:message</span>') }}</p>
                        </div>
                    </div>


                    <div class="control-group {{ ($errors->has('country_id')) ? 'error' : '' }}" for='country_id'>
                        {{ Form::label('country_id', 'Pa&iacute;s', array('class'=>"control-label"))}}
                        <div class="controls"> 
                            {{ Form::select("country_id", array(Str::lower("AF")=>"Afganistán",
                                                                Str::lower("AL")=>"Albania",
                                                                Str::lower("DE")=>"Alemania",
                                                                Str::lower("AD")=>"Andorra",
                                                                Str::lower("AO")=>"Angola",
                                                                Str::lower("AI")=>"Anguilla",
                                                                Str::lower("AQ")=>"Antártida",
                                                                Str::lower("AG")=>"Antigua y Barbuda",
                                                                Str::lower("AN")=>"Antillas Holandesas",
                                                                Str::lower("SA")=>"Arabia Saud&iacute;",
                                                                Str::lower("DZ")=>"Argelia",
                                                                Str::lower("AR")=>"Argentina",
                                                                Str::lower("AM")=>"Armenia",
                                                                Str::lower("AW")=>"Aruba",
                                                                Str::lower("AU")=>"Australia",
                                                                Str::lower("AT")=>"Austria",
                                                                Str::lower("AZ")=>"Azerbaiyán",
                                                                Str::lower("BS")=>"Bahamas",
                                                                Str::lower("BH")=>"Bahrein",
                                                                Str::lower("BD")=>"Bangladesh",
                                                                Str::lower("BB")=>"Barbados",
                                                                Str::lower("BE")=>"Bélgica",
                                                                Str::lower("BZ")=>"Belice",
                                                                Str::lower("BJ")=>"Benin",
                                                                Str::lower("BM")=>"Bermudas",
                                                                Str::lower("BY")=>"Bielorrusia",
                                                                Str::lower("MM")=>"Birmania",
                                                                Str::lower("BO")=>"Bolivia",
                                                                Str::lower("BA")=>"Bosnia y Herzegovina",
                                                                Str::lower("BW")=>"Botswana",
                                                                Str::lower("BR")=>"Brasil",
                                                                Str::lower("BN")=>"Brunei",
                                                                Str::lower("BG")=>"Bulgaria",
                                                                Str::lower("BF")=>"Burkina Faso",
                                                                Str::lower("BI")=>"Burundi",
                                                                Str::lower("BT")=>"Bután",
                                                                Str::lower("CV")=>"Cabo Verde",
                                                                Str::lower("KH")=>"Camboya",
                                                                Str::lower("CM")=>"Camerún",
                                                                Str::lower("CA")=>"Canadá",
                                                                Str::lower("TD")=>"Chad",
                                                                Str::lower("CL")=>"Chile",
                                                                Str::lower("CN")=>"China",
                                                                Str::lower("CY")=>"Chipre",
                                                                Str::lower("VA")=>"Ciudad del Vaticano (Santa Sede)",
                                                                Str::lower("CO")=>"Colombia",
                                                                Str::lower("KM")=>"Comores",
                                                                Str::lower("CG")=>"Congo",
                                                                Str::lower("CD")=>"Congo, República Democrática del",
                                                                Str::lower("KR")=>"Corea",
                                                                Str::lower("KP")=>"Corea del Norte",
                                                                Str::lower("CI")=>"Costa de Marf&iacute;l",
                                                                Str::lower("CR")=>"Costa Rica",
                                                                Str::lower("HR")=>"Croacia (Hrvatska)",
                                                                Str::lower("CU")=>"Cuba",
                                                                Str::lower("DK")=>"Dinamarca",
                                                                Str::lower("DJ")=>"Djibouti",
                                                                Str::lower("DM")=>"Dominica",
                                                                Str::lower("EC")=>"Ecuador",
                                                                Str::lower("EG")=>"Egipto",
                                                                Str::lower("SV")=>"El Salvador",
                                                                Str::lower("AE")=>"Emiratos Árabes Unidos",
                                                                Str::lower("ER")=>"Eritrea",
                                                                Str::lower("SI")=>"Eslovenia",
                                                                Str::lower("ES")=>"Espa&ntilde;a",
                                                                Str::lower("US")=>"Estados Unidos",
                                                                Str::lower("EE")=>"Estonia",
                                                                Str::lower("ET")=>"Etiop&iacute;a",
                                                                Str::lower("FJ")=>"Fiji",
                                                                Str::lower("PH")=>"Filipinas",
                                                                Str::lower("FI")=>"Finlandia",
                                                                Str::lower("FR")=>"Francia",
                                                                Str::lower("GA")=>"Gab&oacute;n",
                                                                Str::lower("GM")=>"Gambia",
                                                                Str::lower("GE")=>"Georgia",
                                                                Str::lower("GH")=>"Ghana",
                                                                Str::lower("GI")=>"Gibraltar",
                                                                Str::lower("GD")=>"Granada",
                                                                Str::lower("GR")=>"Grecia",
                                                                Str::lower("GL")=>"Groenlandia",
                                                                Str::lower("GP")=>"Guadalupe",
                                                                Str::lower("GU")=>"Guam",
                                                                Str::lower("GT")=>"Guatemala",
                                                                Str::lower("GY")=>"Guayana",
                                                                Str::lower("GF")=>"Guayana Francesa",
                                                                Str::lower("GN")=>"Guinea",
                                                                Str::lower("GQ")=>"Guinea Ecuatorial",
                                                                Str::lower("GW")=>"Guinea-Bissau",
                                                                Str::lower("HT")=>"Hait&iacute;",
                                                                Str::lower("HN")=>"Honduras",
                                                                Str::lower("HU")=>"Hungr&iacute;a",
                                                                Str::lower("IN")=>"India",
                                                                Str::lower("ID")=>"Indonesia",
                                                                Str::lower("IQ")=>"Irak",
                                                                Str::lower("IR")=>"Irán",
                                                                Str::lower("IE")=>"Irlanda",
                                                                Str::lower("BV")=>"Isla Bouvet",
                                                                Str::lower("CX")=>"Isla de Christmas",
                                                                Str::lower("IS")=>"Islandia",
                                                                Str::lower("KY")=>"Islas Caimán",
                                                                Str::lower("CK")=>"Islas Cook",
                                                                Str::lower("CC")=>"Islas de Cocos o Keeling",
                                                                Str::lower("FO")=>"Islas Faroe",
                                                                Str::lower("HM")=>"Islas Heard y McDonald",
                                                                Str::lower("FK")=>"Islas Malvinas",
                                                                Str::lower("MP")=>"Islas Marianas del Norte",
                                                                Str::lower("MH")=>"Islas Marshall",
                                                                Str::lower("UM")=>"Islas menores de Estados Unidos",
                                                                Str::lower("PW")=>"Islas Palau",
                                                                Str::lower("SB")=>"Islas Salom&oacute;n",
                                                                Str::lower("SJ")=>"Islas Svalbard y Jan Mayen",
                                                                Str::lower("TK")=>"Islas Tokelau",
                                                                Str::lower("TC")=>"Islas Turks y Caicos",
                                                                Str::lower("VI")=>"Islas V&iacute;rgenes (EE.UU.)",
                                                                Str::lower("VG")=>"Islas V&iacute;rgenes (Reino Unido)",
                                                                Str::lower("WF")=>"Islas Wallis y Futuna",
                                                                Str::lower("IL")=>"Israel",
                                                                Str::lower("IT")=>"Italia",
                                                                Str::lower("JM")=>"Jamaica",
                                                                Str::lower("JP")=>"Jap&oacute;n",
                                                                Str::lower("JO")=>"Jordania",
                                                                Str::lower("KZ")=>"Kazajistán",
                                                                Str::lower("KE")=>"Kenia",
                                                                Str::lower("KG")=>"Kirguizistán",
                                                                Str::lower("KI")=>"Kiribati",
                                                                Str::lower("KW")=>"Kuwait",
                                                                Str::lower("LA")=>"Laos",
                                                                Str::lower("LS")=>"Lesotho",
                                                                Str::lower("LV")=>"Letonia",
                                                                Str::lower("LB")=>"L&iacute;bano",
                                                                Str::lower("LR")=>"Liberia",
                                                                Str::lower("LY")=>"Libia",
                                                                Str::lower("LI")=>"Liechtenstein",
                                                                Str::lower("LT")=>"Lituania",
                                                                Str::lower("LU")=>"Luxemburgo",
                                                                Str::lower("MK")=>"Macedonia, Ex-República Yugoslava de",
                                                                Str::lower("MG")=>"Madagascar",
                                                                Str::lower("MY")=>"Malasia",
                                                                Str::lower("MW")=>"Malawi",
                                                                Str::lower("MV")=>"Maldivas",
                                                                Str::lower("ML")=>"Mal&iacute;",
                                                                Str::lower("MT")=>"Malta",
                                                                Str::lower("MA")=>"Marruecos",
                                                                Str::lower("MQ")=>"Martinica",
                                                                Str::lower("MU")=>"Mauricio",
                                                                Str::lower("MR")=>"Mauritania",
                                                                Str::lower("YT")=>"Mayotte",
                                                                Str::lower("MX")=>"México",
                                                                Str::lower("FM")=>"Micronesia",
                                                                Str::lower("MD")=>"Moldavia",
                                                                Str::lower("MC")=>"M&oacute;naco",
                                                                Str::lower("MN")=>"Mongolia",
                                                                Str::lower("MS")=>"Montserrat",
                                                                Str::lower("MZ")=>"Mozambique",
                                                                Str::lower("NA")=>"Namibia",
                                                                Str::lower("NR")=>"Nauru",
                                                                Str::lower("NP")=>"Nepal",
                                                                Str::lower("NI")=>"Nicaragua",
                                                                Str::lower("NE")=>"N&iacute;ger",
                                                                Str::lower("NG")=>"Nigeria",
                                                                Str::lower("NU")=>"Niue",
                                                                Str::lower("NF")=>"Norfolk",
                                                                Str::lower("NO")=>"Noruega",
                                                                Str::lower("NC")=>"Nueva Caledonia",
                                                                Str::lower("NZ")=>"Nueva Zelanda",
                                                                Str::lower("OM")=>"Omán",
                                                                Str::lower("NL")=>"Pa&iacute;ses Bajos",
                                                                Str::lower("PA")=>"Panamá",
                                                                Str::lower("PG")=>"Papúa Nueva Guinea",
                                                                Str::lower("PK")=>"Paquistán",
                                                                Str::lower("PY")=>"Paraguay",
                                                                Str::lower("PE")=>"Perú",
                                                                Str::lower("PN")=>"Pitcairn",
                                                                Str::lower("PF")=>"Polinesia Francesa",
                                                                Str::lower("PL")=>"Polonia",
                                                                Str::lower("PT")=>"Portugal",
                                                                Str::lower("PR")=>"Puerto Rico",
                                                                Str::lower("QA")=>"Qatar",
                                                                Str::lower("UK")=>"Reino Unido",
                                                                Str::lower("CF")=>"República Centroafricana",
                                                                Str::lower("CZ")=>"República Checa",
                                                                Str::lower("ZA")=>"República de Sudáfrica",
                                                                Str::lower("DO")=>"República Dominicana",
                                                                Str::lower("SK")=>"República Eslovaca",
                                                                Str::lower("RE")=>"Reuni&oacute;n",
                                                                Str::lower("RW")=>"Ruanda",
                                                                Str::lower("RO")=>"Rumania",
                                                                Str::lower("RU")=>"Rusia",
                                                                Str::lower("EH")=>"Sahara Occidental",
                                                                Str::lower("KN")=>"Saint Kitts y Nevis",
                                                                Str::lower("WS")=>"Samoa",
                                                                Str::lower("AS")=>"Samoa Americana",
                                                                Str::lower("SM")=>"San Marino",
                                                                Str::lower("VC")=>"San Vicente y Granadinas",
                                                                Str::lower("SH")=>"Santa Helena",
                                                                Str::lower("LC")=>"Santa Luc&iacute;a",
                                                                Str::lower("ST")=>"Santo Tomé y Pr&iacute;ncipe",
                                                                Str::lower("SN")=>"Senegal",
                                                                Str::lower("SC")=>"Seychelles",
                                                                Str::lower("SL")=>"Sierra Leona",
                                                                Str::lower("SG")=>"Singapur",
                                                                Str::lower("SY")=>"Siria",
                                                                Str::lower("SO")=>"Somalia",
                                                                Str::lower("LK")=>"Sri Lanka",
                                                                Str::lower("PM")=>"St. Pierre y Miquelon",
                                                                Str::lower("SZ")=>"Suazilandia",
                                                                Str::lower("SD")=>"Sudán",
                                                                Str::lower("SE")=>"Suecia",
                                                                Str::lower("CH")=>"Suiza",
                                                                Str::lower("SR")=>"Surinam",
                                                                Str::lower("TH")=>"Tailandia",
                                                                Str::lower("TW")=>"Taiwán",
                                                                Str::lower("TZ")=>"Tanzania",
                                                                Str::lower("TJ")=>"Tayikistán",
                                                                Str::lower("TF")=>"Territorios franceses del Sur",
                                                                Str::lower("TP")=>"Timor Oriental",
                                                                Str::lower("TG")=>"Togo",
                                                                Str::lower("TO")=>"Tonga",
                                                                Str::lower("TT")=>"Trinidad y Tobago",
                                                                Str::lower("TN")=>"Túnez",
                                                                Str::lower("TM")=>"Turkmenistán",
                                                                Str::lower("TR")=>"Turqu&iacute;a",
                                                                Str::lower("TV")=>"Tuvalu",
                                                                Str::lower("UA")=>"Ucrania",
                                                                Str::lower("UG")=>"Uganda",
                                                                Str::lower("UY")=>"Uruguay",
                                                                Str::lower("UZ")=>"Uzbekistán",
                                                                Str::lower("VU")=>"Vanuatu",
                                                                Str::lower("VE")=>"Venezuela",
                                                                Str::lower("VN")=>"Vietnam",
                                                                Str::lower("YE")=>"Yemen",
                                                                Str::lower("YU")=>"Yugoslavia",
                                                                Str::lower("ZM")=>"Zambia",
                                                                Str::lower("ZW")=>"Zimbabue",
                                                                ), 'mx')}}
                        </div>
                    </div>

                    <div class="control-group {{ ($errors->has('sexo')) ? 'error' : '' }}" for='sexo'>
                        {{ Form::label('sexo', 'Sexo', array('class'=>"control-label"))}} 
                        <div class="controls">
                            {{ Form::select('sexo', array('' => 'Seleccione', 'M' => 'Hombre', 'F' => 'Mujer')) }} 
                            <p class="help-block">{{ $errors->first('sexo') }}</p>       
                        </div>
                    </div>         

                   <div class="control-group {{ ($errors->has('estado_de_vida_id')) ? 'error' : '' }}" for='sexo'>
                        {{ Form::label('estado_de_vida_id', 'Estado de Vida', array('class'=>"control-label")) }} 
                        <div class="controls">
                        {{ Form::select('estado_de_vida_id', array('' => 'Seleccione', '1' => 'Solter(o/a)','2' => 'Casad(o/a)', '3' => 'Religioso')) }}
                        <p class="help-block">{{ $errors->first('estado_de_vida_id') }}</p>
                        </div>
                    </div>

                    <div class="control-group {{ ($errors->has('biografia')) ? 'error' : '' }}" for='biografia'>
                        {{ Form::label('biografia', 'Biografía', array('class'=>"control-label")) }}
                        <div class="controls">
                            <textarea id="biografia" name="biografia" value="{{ Request::old('biografia')}}" type="text" rows="5" cols="20"></textarea>
                            <p class="help-block">{{ $errors->first('biografia') }}</p>
                        </div>
                    </div>
                </div> <!-- ./step2 -->
                <div class="step-pane" id="step3">
                    <div id="legend">
                        <legend class="">Suba una imagen</legend>
                    </div>
                    <div class="control-group {{ $errors->has('avtar_file_name') ? 'error' : '' }}">
                        {{ Form::label('avtar_file_name', 'Foto', array('class' => 'control-label')) }}
                        <div class="controls">
                            {{ Form::file('avtar_file_name') }}
                            {{ $errors->first('avtar_file_name', '<span class="help-inline">:message</span>') }}
                        
                        </div>
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
	{{ Html::script('assets/js/jquery-1.9.1.js')}}
    {{ Html::script('assets/js/loader.js')}}
    {{ Html::script('assets/js/bootstrap-datepicker.js') }}
    {{ Html::script('assets/js/jquery.validate.js')}}
    {{ Html::script('assets/js/registro.js')}}
</body>
</html>

