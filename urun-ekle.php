<?php
require 'php/fonksiyonlar.php';
require 'php/sorgular.php';
session_start();

oturumYoksaYonlenVeDur('index.php');

if($_POST){
	//FORM POST EDİLDİYSE ÇALIŞACAK KODLAR

	$formdanGelenUrunVerileri = [
		'ad'    => $_POST['ad']    ?? NULL,
		'stok'  => $_POST['stok']  ?? NULL,
		'fiyat' => $_POST['fiyat'] ?? NULL
	];

	urunEkle($formdanGelenUrunVerileri);
	yonlenVeDur('urunler.php');
}


//HTML ÇIKTISI
require 'html/urun-ekle.php';