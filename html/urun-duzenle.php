<?php require 'tema/ust.php'; ?>


<div class="d-flex">
	<h1 class="me-auto">Ürün Düzenle</h1>
	<div class="ms-auto">
		<a class="btn btn-success" href="urunler.php">
			<i class="fas fa-backward"></i> Geri Gel
		</a>
	</div>
</div>

<form action="urun-duzenle.php" method="post">
	<input type="hidden" name="no" value="<?=$urun['NO']?>" />
	<div class="mb-3">
		<label>Ad</label> <span class="text-danger"></span>
		<input class="form-control" type="text" name="ad" value="<?=$urun['AD']?>" required />
	</div>
	<div class="mb-3">
		<label>Stok</label> <span class="text-danger"></span>
		<input class="form-control" type="number" name="stok" value="<?=$urun['STOK']?>" required />
	</div>
	<div class="mb-3">
		<label>Fiyat</label> <span class="text-danger"></span>
		<input class="form-control" type="number" step="0.01" name="fiyat" value="<?=$urun['FIYAT']?>" required />
	</div>
	<button class="btn btn-primary btn-lg w-100">Tamam</button>
</form>


<?php require 'tema/alt.php'; ?>