<?php
require 'php/fonksiyonlar.php';
require 'php/sorgular.php';
session_start();

oturumYoksaYonlenVeDur('index.php');

$urunler = urunleriVer();


//HTML ÇIKTISI
require 'html/urunler.php';