<?php
include 'simple_html_dom.php';

function accesoAlumno($usuario, $clave){

    $EVENTVALIDATION = '/wEdAA29ABtgHzbDLDZ8i2IiL66qLhWkvKFYsOaCSvCAkdnA3SQuzYxkS4BZfgj9eFosIfs1B3wBeDBSuytLP7WXV1Wj+Acom66qoXdW8H8Sfu1pSjtzpTW31CVGZjUL8cEDHE6QgRsNye+5nJGG/r2nAU1DQtxIMJcI6+vKNwSodoSvppubsFfb0Q/444pjdjzlFB/uWt948gHaAca80ARUswcec1+BY+fffscDi0LTojZe0thmXI8lnGMQDgg7nfbST1P53d8HLcsMPPSWw23i74K4e+kOTxPLlE5Ebau9Ir/h8etd2j0XTw+F62k03bpdIt0=';
    $VIEWSTATE = '/wEPDwULLTEzMTA2NjU0ODQPZBYCZg9kFgICAw9kFgICAw9kFgICAQ8PZBYCHgpvbmtleXByZXNzBSVqYXZhc2NyaXB0OnJldHVybiBzb2xvbnVtZXJvcyhldmVudCk7ZGSGfHEiMMKqZ8fLhm5gdCRpF1d2pGQRxUR7l/uvEVbNyQ==';
    $PREGRA_ESTU_LOGIN = "https://registro.unah.edu.hn/pregra_estu_login.aspx";
    $PREGA_ESTU_MAIN = "https://registro.unah.edu.hn/prega_estu_main.aspx";
	$HISTORIAL_ACADEMICO = "https://registro.unah.edu.hn/historial_academico.aspx";

	$data = http_build_query(array(
		'action'=> $PREGRA_ESTU_LOGIN,
		'__VIEWSTATE'=>$VIEWSTATE,
		'__EVENTVALIDATION'=>$EVENTVALIDATION,
		'ctl00$MainContent$txt_cuenta'=>$usuario,
		'ctl00$MainContent$txt_clave'=>$clave,
		'ctl00$MainContent$Button1'=>"Ingresar"
	));

    $ch = curl_init();
    
	$ops = 	array(
		CURLOPT_URL=>$PREGRA_ESTU_LOGIN,
		CURLOPT_POST=>true,
		//CURLOPT_COOKIEJAR=> '-',
		CURLOPT_COOKIEFILE=> '../includes/cookies/'.$usuario.'.txt',
		CURLOPT_COOKIEJAR=> '../includes/cookies/'.$usuario.'.txt',
		CURLOPT_FOLLOWLOCATION=>true,
		CURLOPT_POSTFIELDS=>$data,
		CURLOPT_RETURNTRANSFER=>true,
		CURLOPT_TIMEOUT=>120,
		CURLOPT_SSL_VERIFYPEER=>false,
		CURLOPT_USERAGENT=>"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36"//$_SERVER['HTTP_USER_AGENT']
	);

	curl_setopt_array($ch, $ops);
	$result = curl_exec($ch);
	$html = str_get_html($result);
	$info = array();

	if( $html->getElementById("MainContent_Label1") != null){
		$info['correoInstitucional']= trim($html->getElementById("MainContent_Label1")->parent()->find('label > b', 0)->innertext );

	    curl_setopt($ch, CURLOPT_URL, $HISTORIAL_ACADEMICO);
	    curl_setopt($ch, CURLOPT_TIMEOUT, 120);
	    $result = curl_exec($ch);
	    $html = str_get_html($result);

        if ((trim($html->getElementById("MainContent_ASPxRoundPanel2_ASPxLabel9")->innertext)) === 'INFORMATICA ADMINISTRATIVA'){
            $CAR2 = 'INFORMÁTICA ADMINISTRATIVA';
        }else if((trim($html->getElementById("MainContent_ASPxRoundPanel2_ASPxLabel9")->innertext)) === 'INGENIERIA AGROINDUSTRIAL(94)'){
            $CAR2 = 'INGENIERÍA AGROINDUSTRIAL';
        }else{
            $CAR2 = trim($html->getElementById("MainContent_ASPxRoundPanel2_ASPxLabel9")->innertext);
        }

	    $info["cuenta"] = trim($html->getElementById("MainContent_ASPxRoundPanel2_ASPxLabel7")->innertext);
	    $info["nombre"] = preg_replace_callback("/(&#[0-9]+;)/", function($m) { return mb_convert_encoding($m[1], "UTF-8", "HTML-ENTITIES"); }, trim($html->getElementById("MainContent_ASPxRoundPanel2_ASPxLabel8")->innertext));
	    $info["carrera"] = $CAR2;
	    $info["centro"] = trim($html->getElementById("MainContent_ASPxRoundPanel2_ASPxLabel10")->innertext);
	    $info["indiceGlobal"] = trim($html->getElementById("MainContent_ASPxRoundPanel2_ASPxLabel11")->innertext);
	    $info["indicePeriodo"] = trim($html->getElementById("MainContent_ASPxRoundPanel2_ASPxLabel12")->innertext);
	    curl_close($ch);
        unlink('../includes/cookies/'.$usuario.'.txt'); // borrar el archivo de las cookies
	    return $info;
	} else {
	    curl_close($ch);
        unlink('../includes/cookies/'.$usuario.'.txt'); // borrar el archivo de las cookies
	}

	//el que lo lea se la come
}

?>
