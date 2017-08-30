<?php
/**
 * @Author: SSimg
 * @Date:   2017-06-12 20:20:00
 * @Last Modified by:   SSimg
 * @Last Modified time: 2017-06-20 21:38:09
 */

use yii\helpers\Html;

$this->title = 'Berita Terbaru';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="square">
    <h4 class="text-center">
        <i class="fa fa-bullhorn"></i> PENGUMUMAN
    </h4>

    <div class="row">
    	<div class="col-md-6">
            <?php foreach ($post1 as $post) { ?>
                <div class="page--post">                    
                    <h4 class="page--header"><a><?= strtoupper($post->title) ?></a></h4>
                    <div class="detail--post">
                        <span><i class="fa fa-calendar"></i> <?= date('d M Y', strtotime($post->date)) ?></span>
                        <span><i class="fa fa-clock-o"></i> <?= date('H:i', strtotime($post->date)) ?> ADMIN WEB</span>
                    </div>
                    <div class="post--body">
                        <?= strtoupper($post->content) ?>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="col-md-6">
            <?php foreach ($post2 as $post) { ?>
                <div class="page--post">                    
                    <h4 class="page--header"><a><?= strtoupper($post->title) ?></a></h4>
                    <div class="detail--post">
                        <span><i class="fa fa-calendar"></i> <?= date('d M Y', strtotime($post->date)) ?></span>
                        <span><i class="fa fa-clock-o"></i> <?= date('H:i', strtotime($post->date)) ?> ADMIN WEB</span>
                    </div>
                    <div class="post--body">
                        <?= strtoupper($post->content) ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>