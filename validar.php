<?php
	define('CLAVE', 'CLAVE_SECRETA');
	
	$token = $_POST['token'];
	$action = $_POST['action'];
	
	$cu = curl_init();
	curl_setopt($cu, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
	curl_setopt($cu, CURLOPT_POST, 1);
	curl_setopt($cu, CURLOPT_POSTFIELDS, http_build_query(array('secret' => CLAVE, 'response' => $token)));
	curl_setopt($cu, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($cu);
	curl_close($cu);
	
	$datos = json_decode($response, true);
	
	print_r($datos);
	
	if($datos['success'] == 1 && $datos['score'] >= 0.5){
		if($datos['action'] == 'validarUsuario'){
			
		}
		
		} else {
		echo "ERES UN ROBOT";
	}	
