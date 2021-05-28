<!DOCTYPE html>
<html class="h-100">
<head>
	<title>PDO ÖRNEK - Giriş Formu</title>

	<!-- BOOTSTRAP -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

	<!-- FONT AWESOME -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

</head>
<body class="h-100 d-flex align-items-center">


<div class="mx-auto" style="width: 330px;">
	<h1>Giriş Formu</h1>
	<form action="index.php" method="post">

		<div class="mb-3">
			<label>Kullanıcı Adı</label>
			<input class="form-control <?=$validasyon['kullaniciAdi']['inputClass']?>" type="text" name="kullanici-adi" required />
			<div class="<?=$validasyon['kullaniciAdi']['msgClass']?>"><?=$validasyon['kullaniciAdi']['msg']?></div>
		</div>

		<div class="mb-3">
			<label>Şifre</label>
			<input class="form-control <?=$validasyon['sifre']['inputClass']?>" type="password" name="sifre" required />
			<div class="<?=$validasyon['sifre']['msgClass']?>"><?=$validasyon['sifre']['msg']?></div>
		</div>

		<button class="btn btn-primary">Giriş</button>
	</form>
</div>


</body>
</html>