<?php
require 'php/fonksiyonlar.php';
require 'php/sorgular.php';
session_start();

oturumYoksaYonlenVeDur('index.php');

$urunNo = $_GET['urun-no'] ?? NULL;
if(!$urunNo){
	yonlenVeDur('urunler.php');
}

urunSil($urunNo);

yonlenVeDur('urunler.php');