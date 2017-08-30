<div class="square" style="font-size: 125%">
    <h4 class="page--header">
    TAHAP PENDAFTARAN BERHASIL
    </h4>

    <div class="alert alert-info" role="alert">
      Selamat, pendaftaran anda berhasil, segera lakukan pembayaran ke <a class="alert-link"><?= $rek ?></a> kemudian silakan mengirimkan <a class="alert-link">SMS/WA konfirmasi</a> dengan isi pesan:
      <p style="margin: 12px 0">
        <a class="alert-link"><?= strtoupper($nisn.'_'.$nama.'_'.$tanggal) ?></a> kirim ke <a class="alert-link"><?= $hp ?></a>
      </p>
       atau dapat juga mengirimkan pesan WA dengan melampirkan <a class="alert-link">Bukti Pengiriman Biaya</a> ke <a class="alert-link">0816 6580 56</a>.
    </div>

    <div class="alert alert-danger" role="alert">
      Maaf, jika pada <a class="alert-link"><?= date('d-m-Y H:i:s', strtotime('+36 HOURS')) ?></a> belum melakukan pembayaran atau konfirmasi pada kami, maka data pendaftaran anda akan kami <a class="alert-link">Hapus dari Sistem</a>. Sehingga anda harus melakukan pengisian form kembali jika akan melakukan pendaftaran selanjutnya.
    </div>
</div>
