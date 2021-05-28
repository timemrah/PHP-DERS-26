<?php


function kullaniciVer($kullaniciAdi){
	$db = veritabaninaBaglan();
	$sorgu = $db->prepare("SELECT * FROM kullanicilar WHERE KULLANICI_ADI=:kullaniciAdi");
	$sorgu->execute(['kullaniciAdi' => $kullaniciAdi]);
	return $sorgu->fetch(PDO::FETCH_ASSOC);
}


function urunleriVer(){
	$db = veritabaninaBaglan();
	$sorgu = $db->query('SELECT * FROM urunler');
	return $sorgu->fetchAll(PDO::FETCH_ASSOC);
}


function urunVer($no){
	$db = veritabaninaBaglan();
	$sorgu = $db->prepare('SELECT * FROM urunler WHERE NO=:no');
	$sorgu->execute(['no' => $no]);
	return $sorgu->fetch(PDO::FETCH_ASSOC);
}


function urunGuncelle($veriler){
	$db = veritabaninaBaglan();
	$sorgu = $db->prepare('UPDATE urunler SET AD=:ad, STOK=:stok, FIYAT=:fiyat WHERE NO=:no');
	$sorgu->execute($veriler);
}


function urunEkle($veriler){
	$db = veritabaninaBaglan();
	$sorgu = $db->prepare('INSERT INTO urunler (AD, STOK, FIYAT) VALUES (:ad, :stok, :fiyat)');
	$sorgu->execute($veriler);
}


function urunSil($no){
	$db = veritabaninaBaglan();
	$sorgu = $db->prepare('DELETE FROM urunler WHERE NO=:no');
	$sorgu->execute(['no' => $no]);
}