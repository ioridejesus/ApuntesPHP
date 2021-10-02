<?php

#------------------------------------------ Eliminar Tildes ---------------------------------------------------------------------------------

function eliminar_tildes($cadena)
{

	$cadena = str_replace(
		array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
		array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
		$cadena
	);

	$cadena = str_replace(
		array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
		array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
		$cadena
	);

	$cadena = str_replace(
		array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
		array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
		$cadena
	);

	$cadena = str_replace(
		array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
		array('o', 'o', 'o', 'o', 'o', 'O', 'O', 'O'),
		$cadena
	);

	$cadena = str_replace(
		array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
		array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
		$cadena
	);

	$cadena = str_replace(
		array('ñ', 'Ñ', 'ç', 'Ç',),
		array('n', 'Ñ', 'c', 'C',),
		$cadena
	);

	return $cadena;
}

#------------------------------------------- Cortar Cadena --------------------------------------------------------------------------------

function CutterCadena($vin)
{

	$vin = trim($vin);
	$tamanio_vin = strlen($vin);

	if ($tamanio_vin <= 8) {

		$new_vin = $vin;
	} else {

		$new_vin = substr($vin, -8);
	}

	return $new_vin;
}

#------------------------------------------- Convertir Numeros a Letras --------------------------------------------------------------------------------

function ConvertirNumeroLetras($numero, $TipoMoneda)
{
	$numero = trim($numero);
	$num = SoloNumeroDecimalFloat($numero);
	$TipoMoneda = trim($TipoMoneda);
	$num = number_format($num, 2, '.', '');
	$cents = substr($num, strlen($num) - 2, strlen($num) - 1);
	$num = (int)$num;
	$numf = milmillon($num);

	if ($TipoMoneda == "USD") {

		return $numf . "" . $cents . " " . $TipoMoneda;
	
	} elseif ($TipoMoneda == "CAD") {
	
		return $numf . "" . $cents . " " . $TipoMoneda;
	
	} elseif ($TipoMoneda == "MXN") {
	
		return $numf . "PESOS " . $cents . "/100 M/N";
	
	}else if ($TipoMoneda == "") {

		return $numf . "" . $cents;
	
	}else {

		return $numf . "" . $cents . $TipoMoneda;

	}
}


function unidad($numuero)
{
	switch ($numuero) {

		case 9: {

				$numu = "NUEVE ";
				break;
			}

		case 8: {

				$numu = "OCHO ";
				break;
			}
		case 7: {

				$numu = "SIETE ";
				break;
			}
		case 6: {

				$numu = "SEIS ";
				break;
			}
		case 5: {

				$numu = "CINCO ";
				break;
			}
		case 4: {

				$numu = "CUATRO";
				break;
			}
		case 3: {

				$numu = "TRES ";
				break;
			}
		case 2: {

				$numu = "DOS ";
				break;
			}
		case 1: {

				$numu = "UNO ";
				break;
			}
		case 0: {

				$numu = "";
				break;
			}
	}
	return $numu;
}

function decena($numdero)
{
	if ($numdero >= 90 && $numdero <= 99) {
		
		$numd = "NOVENTA ";

		if ($numdero > 90)

			$numd = $numd . "Y " . (unidad($numdero - 90));

		} else if ($numdero >= 80 && $numdero <= 89) {
		
		$numd = "OCHENTA ";

		if ($numdero > 80)

			$numd = $numd . "Y " . (unidad($numdero - 80));

		} else if ($numdero >= 70 && $numdero <= 79) {
		
		$numd = "SETENTA ";
		
		if ($numdero > 70)
			
		$numd = $numd . "Y " . (unidad($numdero - 70));

		} else if ($numdero >= 60 && $numdero <= 69) {
		
		$numd = "SESENTA ";
		
		if ($numdero > 60)
			
		$numd = $numd . "Y " . (unidad($numdero - 60));

		} else if ($numdero >= 50 && $numdero <= 59) {
		
		$numd = "CINCUENTA ";
		
		if ($numdero > 50)
			
		$numd = $numd . "Y " . (unidad($numdero - 50));

		} else if ($numdero >= 40 && $numdero <= 49) {
		
		$numd = "CUARENTA ";
		
		if ($numdero > 40)
			
		$numd = $numd . "Y " . (unidad($numdero - 40));

		} else if ($numdero >= 30 && $numdero <= 39) {
		
		$numd = "TREINTA ";
		
		if ($numdero > 30)
			
		$numd = $numd . "Y " . (unidad($numdero - 30));

		} else if ($numdero >= 20 && $numdero <= 29) {
		
			if ($numdero == 20)
			
		$numd = "VEINTE ";
		
		else

			$numd = "VEINTI" . (unidad($numdero - 20));

		} else if ($numdero >= 10 && $numdero <= 19) {
		
			switch ($numdero) {

			case 10: {

					$numd = "DIEZ ";
					break;
				}

			case 11: {
					$numd = "ONCE ";
					break;
				}

			case 12: {
					$numd = "DOCE ";
					break;
				}

			case 13: {
					$numd = "TRECE ";
					break;
				}

			case 14: {
					$numd = "CATORCE ";
					break;
				}

			case 15: {
					$numd = "QUINCE ";
					break;
				}

			case 16: {
					$numd = "DIECISEIS ";
					break;
				}

			case 17: {
					$numd = "DIECISIETE ";
					break;
				}

			case 18: {
					$numd = "DIECIOCHO ";
					break;
				}

			case 19: {
					$numd = "DIECINUEVE ";
					break;
				}
		}

	} else

		$numd = unidad($numdero);
	return $numd;
}

function centena($numc)
{
	if ($numc >= 100) {
		
		if ($numc >= 900 && $numc <= 999) {
			
			$numce = "NOVECIENTOS ";
			
			if ($numc > 900)
				
			$numce = $numce . (decena($numc - 900));
		
		} else if ($numc >= 800 && $numc <= 899) {
		
			$numce = "OCHOCIENTOS ";
		
			if ($numc > 800)
		
			$numce = $numce . (decena($numc - 800));
		
		} else if ($numc >= 700 && $numc <= 799) {
		
			$numce = "SETECIENTOS ";
		
			if ($numc > 700)
		
			$numce = $numce . (decena($numc - 700));
		
		} else if ($numc >= 600 && $numc <= 699) {
		
			$numce = "SEISCIENTOS ";
		
			if ($numc > 600)
		
			$numce = $numce . (decena($numc - 600));
		
		} else if ($numc >= 500 && $numc <= 599) {
		
			$numce = "QUINIENTOS ";
		
			if ($numc > 500)
		
			$numce = $numce . (decena($numc - 500));
		
		} else if ($numc >= 400 && $numc <= 499) {
		
			$numce = "CUATROCIENTOS ";
		
			if ($numc > 400)
		
			$numce = $numce . (decena($numc - 400));
		
		} else if ($numc >= 300 && $numc <= 399) {
		
			$numce = "TRESCIENTOS ";
		
			if ($numc > 300)
		
			$numce = $numce . (decena($numc - 300));
		
		} else if ($numc >= 200 && $numc <= 299) {
		
			$numce = "DOSCIENTOS ";
		
			if ($numc > 200)
		
			$numce = $numce . (decena($numc - 200));
		
		} else if ($numc >= 100 && $numc <= 199) {
		
			if ($numc == 100)
		
			$numce = "CIEN ";
		
			else
		
			$numce = "CIENTO " . (decena($numc - 100));
		}
	} else
	
	$numce = decena($numc);
	return $numce;
}

function miles($nummero)
{
	if ($nummero >= 1000 && $nummero < 2000) {
	
		$numm = "MIL " . (centena($nummero % 1000));
	}
	
	if ($nummero >= 2000 && $nummero < 10000) {
	
		$numm = unidad(Floor($nummero / 1000)) . " MIL " . (centena($nummero % 1000));
	
	}
	
	if ($nummero < 1000)
	
	$numm = centena($nummero);
	return $numm;
}

function decmiles($numdmero)
{
	if ($numdmero == 10000)
	
	$numde = "DIEZ MIL ";
	
	if ($numdmero > 10000 && $numdmero < 20000) {
		
	
		$numde = decena(Floor($numdmero / 1000)) . "MIL " . (centena($numdmero % 1000));
	}
	
	if ($numdmero >= 20000 && $numdmero < 100000) {
		
		$numde = decena(Floor($numdmero / 1000)) . "MIL " . (miles($numdmero % 1000));
	}
	
	if ($numdmero < 10000)
	
	$numde = miles($numdmero);
	return $numde;
}

function cienmiles($numcmero)
{
	if ($numcmero == 100000)
	
	$num_letracm = "CIEN MIL ";
	
	if ($numcmero >= 100000 && $numcmero < 1000000) {
	
		$num_letracm = centena(Floor($numcmero / 1000)) . "MIL " . (centena($numcmero % 1000));
	
	}
	
	if ($numcmero < 100000)
	
	$num_letracm = decmiles($numcmero);
	return $num_letracm;
}

function millon($nummiero)
{
	if ($nummiero >= 1000000 && $nummiero < 2000000) {
	
		$num_letramm = "UN MILLON " . (cienmiles($nummiero % 1000000));
	
	}
	
	if ($nummiero >= 2000000 && $nummiero < 10000000) {
	
		$num_letramm = unidad(Floor($nummiero / 1000000)) . " MILLONES " . (cienmiles($nummiero % 1000000));
	}
	
	if ($nummiero < 1000000)
	
	$num_letramm = cienmiles($nummiero);
	return $num_letramm;
}

function decmillon($numerodm)
{
	if ($numerodm == 10000000)
	
	$num_letradmm = "DIEZ MILLONES ";
	
	if ($numerodm > 10000000 && $numerodm < 20000000) {
	
		$num_letradmm = decena(Floor($numerodm / 1000000)) . "MILLONES " . (cienmiles($numerodm % 1000000));
	}
	
	if ($numerodm >= 20000000 && $numerodm < 100000000) {
	
		$num_letradmm = decena(Floor($numerodm / 1000000)) . "MILLONES " . (millon($numerodm % 1000000));
	}
	
	if ($numerodm < 10000000)
	
	$num_letradmm = millon($numerodm);
	return $num_letradmm;
}

function cienmillon($numcmeros)
{
	if ($numcmeros == 100000000)
	
	$num_letracms = "CIEN MILLONES ";
	
	if ($numcmeros >= 100000000 && $numcmeros < 1000000000) {
	
		$num_letracms = centena(Floor($numcmeros / 1000000)) . "MILLONES " . (millon($numcmeros % 1000000));
	}
	
	if ($numcmeros < 100000000)
	
	$num_letracms = decmillon($numcmeros);
	return $num_letracms;
}

function milmillon($nummierod)
{
	if ($nummierod >= 1000000000 && $nummierod < 2000000000) {
	
		$num_letrammd = "MIL " . (cienmillon($nummierod % 1000000000));
	}
	
	if ($nummierod >= 2000000000 && $nummierod < 10000000000) {
	
		$num_letrammd = unidad(Floor($nummierod / 1000000000)) . " MIL " . (cienmillon($nummierod % 1000000000));
	}
	
	if ($nummierod < 1000000000)
	
	$num_letrammd = cienmillon($nummierod);
	return $num_letrammd;
}


#------------------------------------------- Hoy no circula CDMX --------------------------------------------------------------------------------

function HoyCirculasCDMX($matricula, $engomado)
{

	$matricula = trim($matricula);
	$engomado = trim($engomado);

	#---------TRATAR MATRICULA SOLO NUMEROS----------------------------

	$arr_matricula = str_split($matricula);

	foreach ($arr_matricula as $valor_matricula) {

		if (is_numeric($valor_matricula)) {
			$var_matricula_numero .= $valor_matricula;
		}
	}


	$ultimo_digito = (is_numeric($var_matricula_numero)) ? substr($var_matricula_numero, -1) : "N";

	#---------CONDICIONES POR DIA ----------------------------

	$fecha_actual_hoy = date("l");

	if ($fecha_actual_hoy == "Monday") {

		$primer_numero = 5;
		$segundo_numero = 6;
		$color_restringido = "AMARILLO";

	} else if ($fecha_actual_hoy == "Tuesday") {

		$primer_numero = 7;
		$segundo_numero = 8;
		$color_restringido = "ROSA";

	} else if ($fecha_actual_hoy == "Wednesday") {

		$primer_numero = 3;
		$segundo_numero = 4;
		$color_restringido = "ROJO";

	} else if ($fecha_actual_hoy == "Thursday") {

		$primer_numero = 1;
		$segundo_numero = 2;
		$color_restringido = "VERDE";

	} else if ($fecha_actual_hoy == "Friday") {

		$primer_numero = 9;
		$segundo_numero = 0;
		$color_restringido = "AZUL";

	} else if ($fecha_actual_hoy == "Saturday") {
	} else if ($fecha_actual_hoy == "Sunday") {
	}

	#---------Operaciones POR DIA ----------------------------

	if (is_numeric($ultimo_digito)) {

		if ($ultimo_digito == $primer_numero || $ultimo_digito == $segundo_numero) {

			$result_validar .= "Hoy NO circulan <b>$primer_numero y $segundo_numero</b><br>";

			if ($engomado == $color_restringido) {

				$result_validar .= "Hoy NO circula por <b>engomado</b><br>";
			} elseif ($engomado == "") {

				$result_validar .= "Puedes Circular con permiso<br>";
			}
		} elseif ($ultimo_digito == "") {

			$result_validar .= "Puedes Circular con permiso<br>";

			if ($engomado == $color_restringido) {

				$result_validar .= "Hoy NO circula por <b>engomado</b><br>";
			} elseif ($engomado == "") {

				$result_validar .= "Puedes Circular con permiso<br>";
			}
		} else {

			if ($engomado == $color_restringido) {

				$result_validar .= "Hoy NO circula por <b>engomado</b><br>";
			} elseif ($engomado == "") {

				$result_validar .= "Puedes Circular con permiso<br>";
			}
		}
	} elseif ($ultimo_digito == "") {

		$result_validar .= "Pendiente<br>";
	} else {

		$result_validar .= "Pendiente<br>";
	}

	return $result_validar;
}

#------------------------------------------- Verificacion vehicular verificacion --------------------------------------------------------------------------------

function VerificacionVehicular($engomado)
{

	$engomado = trim($engomado);
	$mes_actual_hoy = date('n');
	$anio_siguiente = date('Y') + 1;


	if ($engomado == "" || is_numeric($engomado) || $engomado == "Pendiente" || $engomado == "PENDIENTE" || $engomado == "POR DEFINIR") {

		$mensaje_verificacion = "No hay engomado para mostrar información";
	} elseif ($engomado == "N/A" || $engomado == "NA") {

		$mensaje_verificacion = "No aplica verificación";
	} else {

		if ($engomado == "AMARILLO") {

			if ($mes_actual_hoy >= 1 and $mes_actual_hoy <= 2) {

				$mensaje_verificacion = "Próxima verificación <b>Enero - Febrero</b>";
			} else if ($mes_actual_hoy >= 3 and $mes_actual_hoy <= 8) {

				$mensaje_verificacion = "Próxima verificación <b>Julio - Agosto</b>";
			} else {

				$mensaje_verificacion = "Próxima verificación <b>Enero - Febrero</b> de $anio_siguiente";
			}
		} else if ($engomado == "ROSA") {

			if ($mes_actual_hoy >= 1 and $mes_actual_hoy <= 3) {

				$mensaje_verificacion = "Próxima verificación <b>Febrero - Marzo</b>";
			} else if ($mes_actual_hoy >= 4 and $mes_actual_hoy <= 9) {

				$mensaje_verificacion = "Próxima verificación <b>Agosto - Septiembre</b>";
			} else {

				$mensaje_verificacion = "Próxima verificación <b>Febrero - Marzo</b> de $anio_siguiente";
			}
		} else if ($engomado == "ROJO") {

			if ($mes_actual_hoy >= 1 and $mes_actual_hoy <= 4) {

				$mensaje_verificacion = "Próxima verificación <b>Marzo - Abril</b>";
			} else if ($mes_actual_hoy >= 5 and $mes_actual_hoy <= 10) {

				$mensaje_verificacion = "Próxima verificación <b>Agosto - Septiembre</b>";
			} else {

				$mensaje_verificacion = "Próxima verificación <b>Marzo - Abril</b> de $anio_siguiente";
			}
		} else if ($engomado == "VERDE") {

			if ($mes_actual_hoy >= 1 and $mes_actual_hoy <= 5) {

				$mensaje_verificacion = "Próxima verificación <b>Abril - Mayo</b>";
			} else if ($mes_actual_hoy >= 6 and $mes_actual_hoy <= 11) {

				$mensaje_verificacion = "Próxima verificación <b>Octubre - Noviembre</b>";
			} else {

				$mensaje_verificacion = "Próxima verificación <b>Abril - Mayo</b> de $anio_siguiente";
			}
		} elseif ($engomado == "AZUL") {

			if ($mes_actual_hoy >= 1 && $mes_actual_hoy <= 6) {

				$mensaje_verificacion = "Próxima verificación <b>Mayo - Junio</b>";
			} else {

				$mensaje_verificacion = "Próxima verificación <b>Noviembre - Diciembre</b>";
			}
		}
	}

	return $mensaje_verificacion;
}

#------------------------------------------- TOKEN Generate --------------------------------------------------------------------------------

function GenerateToken($ok)
{
	$DateToken = date("dmYHis");
	$StartRandom = rand(1, 1000000);
	$FinRandom = rand(10000000, 999999999999);
	$final_rnd_wallet = rand($StartRandom, $FinRandom);
	$TokenComplete = $final_rnd_wallet . $DateToken;
	return $token_new = substr($TokenComplete, -15);

}

#-------------------------------------------  Eliminar: Repetidos,Vacios;Convertir a Mayusculas; Eliminar Acentos  --------------------------------------------------------------

function DeleteRepeats($array_entrada_repetidos)
{
	$array_trim_mayus = array();
	$exit_array = array();

	foreach ($array_entrada_repetidos as $indice => $valor_array) {

		if ($valor_array != "") {
			array_push($array_trim_mayus, trim(strtoupper($valor_array)));
		}
	}

	$eliminar_duplicados = array_unique($array_trim_mayus);

	foreach ($eliminar_duplicados as $key_nuevo => $valor_nuevo_array) {

		if ($valor_nuevo_array != "") {
			array_push($exit_array, eliminar_tildes($valor_nuevo_array));
		}
	}

	return $exit_array;
}

#------------------------------------------- Eliminar Repetidos y vacios tal cual esta escrito tratar array tratar----------------------------------------------------------------

function Tratar_Array($name_array)
{

	$array_tratado = array();
	$array_final = array();

	foreach ($name_array as $key_array_tratado => $value_array_tratado) {

		$value_array_tratado = trim($value_array_tratado);

		if ($value_array_tratado != "") {

			array_push($array_tratado, $value_array_tratado);
		}
	}

	$eliminar_iguales = array_unique($array_tratado);

	foreach ($eliminar_iguales as $key_nuevo => $valor_nuevo_array) {

		if ($valor_nuevo_array != "") {
			array_push($array_final, $valor_nuevo_array);
		}
	}

	return $array_final;
}

#------------------------------------------- Tratar Resultado Array --------------------------------------------------------------------------------

function TratarNumeroText($pasar_array)
{

	foreach ($pasar_array as $key_pasar => $value_pasar) {

		$valor_array .= (is_numeric($value_pasar)) ? "" : $value_pasar;
	}

	return $valor_array = (trim($valor_array) == "") ? 1 : $valor_array;
}

#------------------------------------------- Solo numero y punto solo punto y numero  --------------------------------------------------------------------------------

function SoloNumeroDecimalFloat($monto_total)
{

	$monto_total = trim($monto_total);
	$ConcatNumero = "";
	
	if ($monto_total == "") {

		$solonumero = 0;

	}else {

		$string_array = str_split($monto_total);

		foreach ($string_array as $key_dinero => $value_dinero) {

			if ($value_dinero == "0" || $value_dinero == "1" || $value_dinero == "2" || $value_dinero == "3" || $value_dinero == "4" || $value_dinero == "5" || $value_dinero == "6" || $value_dinero == "7" || $value_dinero == "8" || $value_dinero == "9" || $value_dinero == ".") {
	
				$ConcatNumero .= $value_dinero;
			}
		}

		$VerDecimales = explode(".", $ConcatNumero);
		$ContadorDecimales = count($VerDecimales);
		
		if ($ContadorDecimales <= 1) {
		
			$solonumero = ($ConcatNumero == "") ? 0 : $ConcatNumero;

		}else {

			if ($VerDecimales[0] == "" && $VerDecimales[1] =="") {
				
				$solonumero = 0;

			} else if(is_numeric($VerDecimales[0]) && (is_numeric($VerDecimales[1]) && $VerDecimales[1] != "")) {
				
				$solonumero = "$VerDecimales[0].$VerDecimales[1]";
			
			}elseif (is_numeric($VerDecimales[0]) && $VerDecimales[1] == "") {
				
				$solonumero = $VerDecimales[0];

			}else if ($VerDecimales[0] == "" && is_numeric($VerDecimales[1])) {
				
				$solonumero = ".$VerDecimales[1]";

			}else {
				$solonumero = 0;
			}
		}
	}
	
	return $solonumero;
}

#-------------------------------------------  --------------------------------------------------------------------------------
#-------------------------------------------  --------------------------------------------------------------------------------
#-------------------------------------------  --------------------------------------------------------------------------------
#-------------------------------------------  --------------------------------------------------------------------------------
#-------------------------------------------  --------------------------------------------------------------------------------
#-------------------------------------------  --------------------------------------------------------------------------------
#-------------------------------------------  --------------------------------------------------------------------------------
#-------------------------------------------  --------------------------------------------------------------------------------
#-------------------------------------------  --------------------------------------------------------------------------------
#-------------------------------------------  --------------------------------------------------------------------------------
#-------------------------------------------  --------------------------------------------------------------------------------
#-------------------------------------------  --------------------------------------------------------------------------------
#-------------------------------------------  --------------------------------------------------------------------------------
#-------------------------------------------  --------------------------------------------------------------------------------
#-------------------------------------------  --------------------------------------------------------------------------------
#-------------------------------------------  --------------------------------------------------------------------------------
#-------------------------------------------  --------------------------------------------------------------------------------
#-------------------------------------------  --------------------------------------------------------------------------------
#-------------------------------------------  --------------------------------------------------------------------------------
#-------------------------------------------  --------------------------------------------------------------------------------
#-------------------------------------------  --------------------------------------------------------------------------------
#-------------------------------------------  --------------------------------------------------------------------------------
#-------------------------------------------  --------------------------------------------------------------------------------
#-------------------------------------------  --------------------------------------------------------------------------------
#-------------------------------------------  --------------------------------------------------------------------------------
#-------------------------------------------  --------------------------------------------------------------------------------
#-------------------------------------------  --------------------------------------------------------------------------------
#-------------------------------------------  --------------------------------------------------------------------------------
#-------------------------------------------  --------------------------------------------------------------------------------
#-------------------------------------------  --------------------------------------------------------------------------------
#-------------------------------------------  --------------------------------------------------------------------------------
?>