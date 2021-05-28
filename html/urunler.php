<?php require 'tema/ust.php'; ?>


<div class="d-flex">
	<h1 class="me-auto">Ürünler</h1>
	<div class="ms-auto">
		<a class="btn btn-success" href="urun-ekle.php">
			<i class="fas fa-plus"></i> Ürün Ekle
		</a>
	</div>
</div>

<table class="table">
	<thead>
		<th>NO</th>
		<th>AD</th>
		<th>STOK</th>
		<th>FIYAT</th>
		<th></th>
	</thead>
	<tbody>
	<?php foreach ($urunler as $satirNo => $urun) { ?>
		<tr>
			<td><?=$urun['NO']?></td>
			<td><?=$urun['AD']?></td>
			<td><?=$urun['STOK']?></td>
			<td><?=$urun['FIYAT']?></td>
			<td class="text-end">
				<a class="btn btn-sm btn-primary" href="urun-duzenle.php?urun-no=<?=$urun['NO']?>">
					<i class="fas fa-edit"></i> Düzenle
				</a>
				<a class="btn btn-sm btn-danger" href="urun-sil.php?urun-no=<?=$urun['NO']?>">
					<i class="fas fa-trash-alt"></i> Sil
				</a>
			</td>
		</tr>
	<? } ?>
	</tbody>
</table>


<?php require 'tema/alt.php'; ?>


	