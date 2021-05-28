<?php
require 'php/fonksiyonlar.php';
require 'php/sorgular.php';
session_start();

oturumVarsaYonlenVeDur('urunler.php');

//VALIDASYON VERİLERİNİ İLKLENDİRME
$validasyonDurum = true;
$validasyon = [
	'kullaniciAdi' => [
		'inputClass' => '',
		'msgClass'   => '',
		'msg'        => ''
	],
	'sifre' => [
		'inputClass' => '',
		'msgClass'   => '',
		'msg'        => ''
	]
];


if($_POST){
	//FORM GÖNDERİLMİŞ İSE ÇALIŞACAK KODLAR


	//FORMDAN GELEN POST VERİLERİ
	$kullaniciAdi = $_POST['kullanici-adi'] ?? null;
	$sifre 	      = $_POST['sifre'] ?? null;


	//KULLANICI ADI VALIDASYON
	if($kullaniciAdi){
		//KULLANICI ADI VARSA
		if(!filter_var($kullaniciAdi, FILTER_VALIDATE_EMAIL)){
			//KULLANICI ADI E-POSTA DEĞİLSE
			$validasyon['kullaniciAdi'] = validasyonOlumsuz('Kullanıcı adı e-posta yazım kuralına uygun değil');
		} else if(strlen($kullaniciAdi) < 8){
			//KULLANICI ADI 5 KARAKTERDEN KISA
			$validasyon['kullaniciAdi'] = validasyonOlumsuz('Kullanıcı adı 5 karakterden kısa olamaz');
		} else{
			//KULLANICI ADI 5 KARAKTERDEN UZUN
			$validasyon['kullaniciAdi'] = validasyonOlumlu('Kullanıcı adı uygun');
		}
	} else{
		//KULLANICI ADI YOKSA
		$validasyon['kullaniciAdi'] = validasyonOlumsuz('Kullanıcı adı olmadan giriş yapılamaz');
	}

	//ŞİFRE VALIDASYON
	if($sifre){
		//ŞİFRE VARSA
		if(strlen($sifre) < 6){
			//ŞİFRE 6 KARAKTERDEN KISA
			$validasyon['sifre'] = validasyonOlumsuz('Şifre 6 karakterden kısa olamaz');
		} else{
			//ŞİFRE 6 KARAKTERDEN UZUN
			$validasyon['sifre'] = validasyonOlumlu('Şifre uygun');
		}

	} else{
		//ŞİFRE YOKSA
		$validasyon['sifre'] = validasyonOlumsuz('Şifre olmadan giriş yapılamaz');
	}


	if($validasyonDurum){
		//FORM VALIDASYONUNDA SORUN YOKSA 

		//VERİTABANINDAN KULLANICI SORGULA
		$kullanici = kullaniciVer($kullaniciAdi);

		//VERİTABANINDAN GELEN VERİLERLE KULLANICI GİRİŞ KONTROLÜ
		if($kullanici){
			//KULLANICI BULUNDUYSA
			if($sifre === $kullanici['SIFRE']){
				//ŞİFRE DOĞRUYSA GİRİŞ BAŞARILI
				$_SESSION['KULLANICI_ADI'] = $kullaniciAdi;
				yonlenVeDur('urunler.php');
			} else{
				//ŞİFRE HATALIYSA GİRİŞ BAŞARISIZ
				$validasyon['kullaniciAdi'] = validasyonOlumlu('Kullanıcı bulundu');
				$validasyon['sifre'] 	    = validasyonOlumsuz('Şifreniz hatalı');
			}
		} 
		else{
			//KULLANICI YOKSA
			$validasyon['kullaniciAdi'] = validasyonOlumsuz('Böyle bir kullanıcı yok');
			$validasyon['sifre'] 		= validasyonOlumsuz();
		}

	} else{
		//FORM VALIDASYONU UYGUN DEĞİL	
	}

}




//HTML ÇIKTISI
require 'html/index.php';