<?php

namespace app\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;

/**
 * Class List Menu
 * Theme menu widget.
 */
class ListMenu extends Component
{
    public $items = [];

    public function items()
    {

      $items = [];
      $guest = Yii::$app->user;
      $user  = Yii::$app->user->identity;

      if ($guest->isGuest) {
          $items = [
              ['label' => 'Home', 'url' => ['/site']],
            //   [
            //       'label' => 'Informasi',
            //       'items' => [
            //           ['label' => 'Informasi Umum', 'url' => ['/site/informasi']],
            //           ['label' => 'Cara Daftar', 'url' => ['/site/tata-cara-pendaftaran']],
            //           ['label' => 'Jadwal Penting', 'url' => ['/site#jadwal-penting']],
            //       ],
            //   ],
              ['label' => 'Galeri', 'url' => ['/site/galeri']],
              ['label' => 'Lokasi', 'url' => ['/site#panlok']],
              [
                  'label' => 'Download',
                  'items' => [
                      ['label' => 'Materi Belajar', 'url' => ['/site/download-materi']],
                      ['label' => 'Berkas Aritmatika', 'url' => ['/site/download']],
                  ],
              ],
              ['label' => 'Pengumuman', 'url' => ['/site/berita']],
              ['label' => 'Kontak', 'url' => ['/site/kontak']],
          ];
      } else {
          if ($user->menu == 0) {
              $items = [
                  ['label' => 'Home', 'url' => ['/site']],
                  [
                      'label' => 'Fitur',
                      'items' => [
                          ['label' => 'Cetak Kartu Peserta', 'url' => ['/profil/cetak-kartu']],
                          ['label' => 'Download Materi Belajar', 'url' => ['/profil/download']],
                          ['label' => 'Ubah Kata Sandi', 'url' => ['/profil/ubah-kata-sandi']],
                          ['label' => 'Ubah Foto', 'url' => ['/profil/ubah-foto']],
                          ['label' => 'Cek Jumlah Pendaftar', 'url' => ['/profil/cek-jumlah-pendaftar']],
                      ],
                  ],
                  [
                      'label' => 'Informasi',
                      'items' => [
                          ['label' => 'Informasi Umum', 'url' => ['/site/informasi']],
                          ['label' => 'Cara Daftar', 'url' => ['/site/tata-cara-pendaftaran']],
                          ['label' => 'Lokasi Lomba', 'url' => ['/site#panlok']],
                          ['label' => 'Jadwal Penting', 'url' => ['/site#jadwal-penting']],
                      ],
                  ],
                  ['label' => 'Download', 'url' => ['/site/download']],
                  ['label' => 'Pengumuman', 'url' => ['/site/berita']],
                  [
                      'label' => 'Tentang',
                      'items' => [
                          ['label' => 'Galeri Tahun Lalu', 'url' => ['/site/galeri']],
                          ['label' => 'Kontak Kami', 'url' => ['/site/kontak']],
                      ],
                  ],
              ];
          } elseif ($user->menu == 1) {
              $items = [
                  ['label' => 'Home', 'url' => ['/site']],
                  ['label' => 'Dashboard', 'url' => ['/admin-pusat']],
                  [
                      'label' => 'Hak Akses',
                      'items' => [
                          ['label' => 'Input Data Offline', 'url' => ['/input-data']],
                          ['label' => 'Validasi Data', 'url' => ['/validasi-data']],
                          ['label' => 'Lolos - Tidak', 'url' => ['/admin-lolos']],
                          ['label' => 'Buka - Tutup Pengumuman', 'url' => ['/admin-lolos/pengaturan']],
                          ['label' => 'Generate Password', 'url' => ['/admin-pusat/generate-password']],
                          ['label' => 'Aktifkan Pembahasan', 'url' => ['/pembahasan']],
                          ['label' => 'Input OTS', 'url' => ['/ots/daftar']],
                      ],
                  ],
                  [
                      'label' => 'Data',
                      'items' => [
                          ['label' => 'Data Sekolah', 'url' => ['/admin-pusat/sekolah']],
                          ['label' => 'Data Semua Peserta', 'url' => ['/admin-pusat/peserta']],
                          ['label' => 'Data FAQ', 'url' => ['/faq/index']],
                          ['label' => 'Cetak Data', 'url' => ['/admin-pusat/cetak']],
                          ['label' => 'Data User', 'url' => ['/data-user/index']],
                          ['label' => 'Sertifikat', 'url' => ['/admin-pusat/sertifikat']],
                      ],
                  ],
                  ['label' => 'Posting Pengumuman', 'url' => ['/admin-pusat/post']],
                  ['label' => 'Pengaturan Sistem', 'url' => ['/admin-pusat/pengaturan']],
              ];
          } elseif ($user->menu == 2) {
              $items = [
                  ['label' => 'Home', 'url' => ['/site']],
                  ['label' => 'Dashboard', 'url' => ['/validasi-data']],
                  ['label' => 'Ubah Data', 'url' => ['/data-user']],
                  ['label' => 'Sertifikat', 'url' => ['/admin-pusat/sertifikat']],
                  ['label' => 'Input OTS', 'url' => ['/ots/daftar']],
              ];
          } elseif ($user->menu == 3) {
              $items = [
                  ['label' => 'Home', 'url' => ['/site']],
                  ['label' => 'Dashboard', 'url' => ['/input-data']],
                  ['label' => 'Sertifikat', 'url' => ['/admin-pusat/sertifikat']],
                  ['label' => 'Input OTS', 'url' => ['/ots/daftar']],
              ];
          } elseif ($user->menu == 4) {
              $items = [
                  ['label' => 'Home', 'url' => ['/site']],
                  ['label' => 'Dashboard', 'url' => ['/admin-lolos/index', 'id' => 'all']],
                  ['label' => 'Buka - Tutup Pengumuman', 'url' => ['/admin-lolos/pengaturan']],
              ];
          }
      }

      return $items;
    }
}
