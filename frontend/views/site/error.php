<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<br>
<br>
<div id="expertise" class="section p-t-60 bg--grey" style="
        background-image:url('<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/ppc/ppc_section-bg-01.png');
        padding-bottom:100px;
        ">
    <div class="row">
        <div class="large-8 medium-12 small-12 large-centered column">
            <div class="el-content text-center   animate " data-animate="fadeInUp" data-duration="1s" data-delay="0.1s" data-offset="50">
                <p class="el-subtitle">Whoops</p>
                <h2 class="el-title"><?= Html::encode($this->title) ?></h2>
                <div class="divider"></div>
                <div class="clear"></div>
                <p class="m-t-30">Kami tidak menemukan konten yang anda inginkan. Silahkan kembali ke halaman utama.
                    <br>
                    <br>
                    <a href="<?= Yii::$app->request->baseUrl ?>"><b>Back To Home</b></a>
                </p>
            </div>
        </div>
    </div>
</div>