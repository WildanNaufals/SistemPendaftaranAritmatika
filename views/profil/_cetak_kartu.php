<div class="main-kartu">
  <div class="konten-kartu">
    <div class="kepala">
      <img src="<?= Yii::$app->request->baseUrl . '/img/kartu/kepala.png'?>" class="logo">
    </div>
    <div class="identitas">
      <table>
        <tr>
          <td class="nama-ident rata-top">
            NOMOR PESERTA:<br>
            NAMA PESERTA : 
          </td>
          <td class="kont-ident rata-top">
            <?= $model->no_peserta ?><br>            
            <?= $model->nama ?>
          </td>
          <td class="bar-kode">
            <barcode code="<?= $bar ?>" type="c39" size="0.8" height="1"></barcode><br>
            <span class="text-validasi">Validasi Sistem: <?= $bar ?></span>
          </td>
        </tr>
      </table>
    </div>
    <div class="konten-utama">
      <table>
        <tr>
          <td class="kiri">
            <div class="foto-diri">
              <img src="<?= Yii::$app->request->baseUrl . '/img/user/' . $model->foto ?>" class="foto">
            </div>
            <br>
            <div class="nama-panlok">
              <?= $model->panlok ?>
            </div>
          </td>

          <td class="kanan">
            <div class="judul">TEMPAT, TANGGAL LAHIR</div>
            <div class="konten-kanan"><?= strtoupper($model->tempat_lahir . ', ' . date('d M Y', strtotime($model->tanggal_lahir))) ?></div>
            <br>
            <div class="judul">NO. TELEPON</div>
            <div class="konten-kanan"><?= $model->hp ?></div>
            <br>
            <div class="judul">ALAMAT</div>
            <div class="konten-kanan"><?= strtoupper($model->alamat_peserta) ?></div>
          </td>
          <td class="kanan">
            <div class="judul">NISN</div>
            <div class="konten-kanan"><?= $model->nisn ?></div>
            <br>
            <div class="judul">JENIS PENDAFTARAN</div>
            <div class="konten-kanan"><?= str_replace('_', '', $model->jenis_pendaftaran)  ?></div>
            <br>
            <div class="judul">SEKOLAH ASAL</div>
            <div class="konten-kanan"><?= strtoupper($model->nama_sekolah) ?></div>
          </td>
        </tr>
      </table>
    </div>

    <div class="konten-info">
      <img src="<?= Yii::$app->request->baseUrl . '/img/kartu/foot.png'?>" class="logo">
    </div>

  </div>
</div>

<div class="potong">*** POTONG DISINI <strong>( PANITIA LOMBA )</strong> ***</div>

<div class="daftar">
  <div class="konten">
    <table>
      <tr>
        <td class="nama-ident rata-top">
          NOMOR PESERTA:<br>
          NAMA PESERTA : 
        </td>
        <td class="kont-ident rata-top">
          <?= $model->no_peserta ?><br>            
          <?= $model->nama ?>
        </td>
        <td class="bar-kode">
          <barcode code="<?= $bar ?>" type="c39" size="0.8" height="1"></barcode><br>
          <span class="text-validasi">Validasi Sistem: <?= $bar ?></span>
        </td>
      </tr>
    </table>
  </div>
  <div class="konten">
    <table>
      <tr>
        <td class="pernyataan">
          <span class="judul-pernyataan">PERNYATAAN !</span>
          <p class="konten-pernyataan">
            Saya yang bertanda tangan di bawah ini menyatakan bahwa data diri yang saya isikan sebagai syarat pendaftaran Aritmatika 2017 adalah benar. Apabila dikemudian hari diketahui bahwa data diri tersebut tidak benar, maka saya bersedia menerima konsekuensi pembatalan sebagai peserta Aritmatika 2017 atau didiskualifikasi dari acara Aritmatika 2017.
          <br><br>
            Demikian pernyataan ini saya buat untuk dipergunakan sebagaimana mestinya.
          <br><br><br>
            <table class="tbl-ttd">
              <tr class="rata-tengah">
                <td class="tanda-tangan">
                  <?=ucwords(strtolower($model->panlok)) . ', ' . date('d M Y') ?><br>
                  Yang membuat pernyataan,<br>
                  <br><br><br>
                  <strong><u><?= strtoupper($model->nama) ?></u></strong><br>
                  <strong>NISN: <?= strtoupper($model->nisn) ?></strong>
                </td>
              </tr>
            </table>
          </p>
        </td>
        <td class="bar-kode">
          <div class="foto-diri">
            <img src="<?= Yii::$app->request->baseUrl . '/img/user/' . $model->foto ?>" class="foto"><br><br><br>
            <?= $model->nama_sekolah ?>
          </div>
        </td>
      </tr>
    </table>
  </div>
</div>