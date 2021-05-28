<?php


function oturumYoksaYonlenVeDur($adres){
	if(empty($_SESSION['KULLANICI_ADI'])){
		Header('Location:' . $adres);
		exit();
	}
}


function oturumVarsaYonlenVeDur($adres){
	if(!empty($_SESSION['KULLANICI_ADI'])){
		Header('Location:' . $adres);
		exit();
	}
}


function veritabaninaBaglan(){
	
	static $db = false;

	if($db === false){
		try{
			$db = new PDO('mysql:host=localhost;dbname=site-veritabani;charset=utf8', 'root', '');
		} catch(PDOException $e){
			echo $e->getMessage();
			exit();
		}
	}

	return $db;
}


function yonlenVeDur($adres){
	header('location:' . $adres);
		exit();
}


function validasyonOlumlu($msg = ''){
	return [
		'inputClass' => 'is-valid',
		'msgClass'   => 'valid-feedback',
		'msg'        => $msg
	];
}


function validasyonOlumsuz($msg = ''){
	global $validasyonDurum;
	$validasyonDurum = false;
	return [
		'inputClass' => 'is-invalid',
		'msgClass'   => 'invalid-feedback',
		'msg'        => $msg
	];
}