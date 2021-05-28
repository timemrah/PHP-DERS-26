<?php
require 'php/fonksiyonlar.php';
require 'php/sorgular.php';
session_start();

oturumYoksaYonlenVeDur('index.php');


if($_SERVER['REQUEST_METHOD'] === 'GET'){
	//YALNIZCA SAYFA GÖRÜNTÜLENİYORSA YANİ GET İSTEĞİNDE ÇALIŞACAK KODLAR

	$urunNo = $_GET['urun-no'] ?? NULL;
	if(!$urunNo){
		yonlenVeDur('urunler.php');
	}

	$urun = urunVer($urunNo);
	if(!$urun){
		yonlenVeDur('urunler.php');
	}


} else if($_SERVER['REQUEST_METHOD'] === 'POST'){
	//FORM POST EDİLDİYSE ÇALIŞACAK KODLAR

	$formdanGelenUrunVerileri = [
		'no'    => $_POST['no']    ?? NULL,
		'ad'    => $_POST['ad']    ?? NULL,
		'stok'  => $_POST['stok']  ?? NULL,
		'fiyat' => $_POST['fiyat'] ?? NULL
	];

	if(!$formdanGelenUrunVerileri['no']){
		yonlenVeDur('urunler.php');
	}

	urunGuncelle($formdanGelenUrunVerileri);
	yonlenVeDur('urunler.php');

}


//HHTML ÇIKTISI
require 'html/urun-duzenle.php';