<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-18 02:18:49
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-07-09 22:20:28
 */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Aktifkan Pengumuman';
$this->params['breadcrumbs'][] = ['label' => 'Admin Lolos', 'url' => ['/admin-lolos']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="row">
	<div class="col-sm-6">
<?= ($pengumuman == 1) ? '
	<div class="jumbotron">
		<h4>SEDANG AKTIF</h4>
		<p>PENGUMUMAN SUDAH DIAKTIFKAN</p>
		<p>'.
		Html::a('Non Aktifkan Sekarang',
			['/admin-lolos/aktifkan', 'a' => Yii::$app->user->identity->id, 'b' => Yii::$app->user->identity->auth_key, 'c' => 'off'],
			['class' => 'btn btn-primary btn-lg']).
	'</p></div>'
:
	'<div class="jumbotron">
		<h4>TIDAK AKTIF</h4>
		<p>PENGUMUMAN SUDAH DINONAKTIFKAN</p>
		<p>'.
		Html::a('Aktifkan Sekarang',
			['/admin-lolos/aktifkan', 'a' => Yii::$app->user->identity->id, 'b' => Yii::$app->user->identity->auth_key, 'c' => 'on'],
			['class' => 'btn btn-danger btn-lg']).
	'</p></div>'
?>
</div>
<div class="col-sm-6">
<?= ($pendaftaran == 1) ? '
	<div class="jumbotron">
		<h4>SEDANG AKTIF</h4>
		<p>PENDAFTARAN MASIH DIBUKA</p>
		<p>'.
		Html::a('Tutup Sekarang',
			['/admin-lolos/tutup', 'a' => Yii::$app->user->identity->id, 'b' => Yii::$app->user->identity->auth_key, 'c' => 'off'],
			['class' => 'btn btn-primary btn-lg']).
	'</p></div>'
:
	'<div class="jumbotron">
		<h4>TIDAK AKTIF</h4>
		<p>PENDAFTARAN SUDAH DITUTUP</p>
		<p>'.
		Html::a('Buka Sekarang',
			['/admin-lolos/tutup', 'a' => Yii::$app->user->identity->id, 'b' => Yii::$app->user->identity->auth_key, 'c' => 'on'],
			['class' => 'btn btn-danger btn-lg']).
	'</p></div>'
?>
</div>
</div>