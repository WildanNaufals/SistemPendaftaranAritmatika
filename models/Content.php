<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-15 10:47:20
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-06-17 00:50:46
 */

namespace app\models;

use Yii;
use yii\base\Model;

class Content extends Model {

    public function tingkat($i) {
        if ($i < 0 || $i >= 2) {

        }
        $data   = [
            'MENENGAH ATAS',
            'MENENGAH PERTAMA'
        ];
        return $data[$i];
    }

    public function panlok($i) {
        if ($i < 0 || $i >= 7) {

        }
        $data   = [
            'KEDU',
            'PATI',
            'PEKALONGAN',
            'PURWOKERTO',
            'SEMARANG',
            'SURAKARTA',
            'YOGYAKARTA'
        ];
        return $data[$i];
    }

    public function lokasi($i) {
        if ($i < 0 || $i >= 7) {

        }
        $data   = [
            'SMA NEGERI 4 MAGELANG',
            'SMA NEGERI 1 PATI',
            'UNIVERSITAS PEKALONGAN',
            'FAKULTAS KEGURUAN DAN ILMU PENDIDIKAN (FKIP) UMP',
            'FAKULTAS MATEMATIKA DAN ILMU PENGETAHUAN ALAM (FMIPA) UNNES',
            'GEDUNG D FKIP UNS',
            'FAKULTAS MATEMATIKA DAN ILMU PENGETAHUAN ALAM (FMIPA) UGM'
        ];
        return $data[$i];
    }

    public function maps($i) {
        if ($i < 0 || $i >= 7) {

        }
        $data   = [
            'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2797.1529626865026!2d110.20650815253597!3d-7.490445931412865!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a8f697cdae33b%3A0x931ae4d7223d6702!2sSMA+Negeri+4!5e0!3m2!1sid!2sid!4v1500879718767',
            'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15848.50975445794!2d111.0245652!3d-6.7543096!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcb68907a8bfffd9d!2sSMA+Negeri+1+Pati!5e0!3m2!1sid!2s!4v1500699046284',
            'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.966397795589!2d109.65716011425434!3d-6.894622769384409!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7026830eedf08d%3A0x98107fb225318085!2sUniversitas+Pekalongan!5e0!3m2!1sid!2sid!4v1500878483160',
            'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2352.5281557904746!2d109.27169634613031!3d-7.413677807406395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e655c090918540f%3A0xe4826a6c5c08a380!2sMuhammadiyah+University+Purwokerto!5e0!3m2!1sen!2s!4v1500879191880',
            'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1979.8272229751074!2d110.39311540792504!3d-7.049829686794136!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3745dc0c8ded8c!2sFakultas+Matematika+dan+Ilmu+Pengetahuan+Alam!5e0!3m2!1sid!2sid!4v1500878904260',
            'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d988.7922985510716!2d110.85510755914687!3d-7.556523081211385!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd4c044359fa266c9!2sGedung+D+FKIP+UNS!5e0!3m2!1sid!2sid!4v1494668546420',
            'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1175.2956319916505!2d110.3765949236184!3d-7.767803734430243!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc7488103a6c22ce2!2sFakultas+Matematika+dan+Ilmu+Pengetahuan+Alam+UGM!5e0!3m2!1sid!2sid!4v1500878745336'
        ];
        return $data[$i];
    }
}
