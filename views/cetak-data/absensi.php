<div class="utama">
	<table class="table header">
		<tr>
			<td class="gambar-logo">
				<img src="<?= Yii::$app->request->baseUrl . '/img/logo-kiri.gif'?>" class="logo">
			</td>
			<td class="ristek">
				KEMENTERIAN RISET, TEKNOLOGI, DAN PENDIDIKAN TINGGI<br>
				UNIVERSITAS SEBELAS MARET<br>
				FAKULTAS KEGURUAN DAN ILMU PENDIDIKAN<br>
				HIMPUNAN MAHASISWA PENDIDIKAN MATEMATIKA<br><br>
				<span class="alamat">Sekretariat: R. 5317 lt. 3 Gd. D FKIP UNS Jl. Ir Sutami 36 A Kentingan, Surakarta 57126</span>
			</td>
			<td class="gambar-logo">
				<img src="<?= Yii::$app->request->baseUrl . '/img/logo-kanan.gif'?>" class="logo">
			</td>
		</tr>
	</table>

	<div class="desc">
		DAFTAR HADIR PESERTA BABAK PENYISIHAN LOMBA ARITMATIKA 2017<br>
		TINGKAT SMA/SEDERAJAT SE-JAWA TENGAH & DIY<br>
		LOKASI <strong><?= strtoupper($lokasi) ?></strong> | TINGKAT <strong><?= strtoupper($tingkat) ?></strong>
	</div>
</div>

<table class="table">
	<thead>
		<tr>
			<td class="thead no">#</td>
			<td class="thead no-peserta">
				NO. PESERTA<br>
				<span class="validasi">KODE VALIDASI</span>
			</td>
			<td class="thead nama">NAMA LENGKAP</td>
			<td class="thead foto">FOTO</td>
			<td class="thead sekolah">ASAL SEKOLAH</td>
			<td class="thead tanda-tangan" colspan="2">TANDA TANGAN</td>
		</tr>
	</thead>
	<tbody>
		<?php $i = 1; $j = 1 ?>
		<?php foreach ($model as $data) { ?>
		<tr>
			<td class="tbody no nbody"><?= $i++ ?></td>
		    <td class="tbody no-peserta">
		    	<?= $data->no_peserta ?><br>
				<span class="validasi"><?= $data->validasi ?></span>
			</td>
		    <td class="tbody"><?= strtoupper($data->nama) ?></td>
		    <td class="fbody">
				<img class="fotobody" src="<?= '/img/user/' . $data->foto ?>" />
			</td>
		    <td class="tbody"><?= strtoupper($data->nama_sekolah) ?></td>
		    <td class="ttd">
		    	<?php if ($i%2 == 0) {
		    		echo $j++;
		    	} ?>
	    	</td>
		    <td class="ttd ttd-2">
		    	<?php if ($i%2 == 1) {
		    		echo $j++;
		    	} ?>
		    </td>
		</tr>
		<?php } ?>
	</tbody>
</table>
