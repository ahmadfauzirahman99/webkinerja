<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\WebTiketEventsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Tiket Event';
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['web-events/index']];
$this->params['breadcrumbs'][] = ['label' => $event->eventsJudul, 'url' => ['web-events/view', 'id' => $event->eventsID]];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $this->beginBlock('nav-event');?>
<nav class="navbar navbar-static-top" style="background: white; margin-bottom: 0px">
    <div class="container-fluid">
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="<?= \yii\helpers\Url::to(['web-events/view', 'id' => $event->eventsID])?>"">
                    <i class="fa fa-calendar"></i> Detail event
                    </a>
                </li>

                <li>
                    <a href="<?= \yii\helpers\Url::to(['web-jadwal-events/index', 'id' => $event->eventsID])?>"">
                    <i class="fa fa-calendar"></i> Jadwal event
                    <span class="label label-success"><?= $jadwal_count?></span>
                    </a>
                </li>

                <li>
                    <a href="<?= \yii\helpers\Url::to(['web-booking/index', 'id' => $event->eventsID])?>">
                        <i class="fa fa-inbox"></i> Stand Booking
                        <span class="label label-success"><?= $booking_count?></span>
                    </a>
                </li>

                <li>
                    <a href="<?= \yii\helpers\Url::to(['web-tiket-events/index', 'id' => $event->eventsID])?>">
                        <i class="fa fa-user"></i> Peserta
                        <span class="label label-success"><?= $tiket_count?></span>
                    </a>
                </li>

                <li>
                    <a href="<?= \yii\helpers\Url::to(['web-presentasi/index', 'id' => $event->eventsID])?>">
                        <i class="fa fa-line-chart"></i> Jadwal Presentasi
                        <span class="label label-success"><?= $jadwal_presentasi_count?></span>
                    </a>
                </li>

                <li>
                    <a href="<?= \yii\helpers\Url::to(['web-stands/index', 'id' => $event->eventsID])?>">
                        <i class="fa fa-inbox"></i> Daftar Stand
                        <span class="label label-success"><?= $stands_count?></span>
                    </a>
                </li>

                <li>
                    <a href="<?= \yii\helpers\Url::to(['web-dokumentasi/index', 'id' => $event->eventsID])?>">
                        <i class="fa fa-camera"></i> Dokumentasi
                        <span class="label label-success"><?= $foto_count?></span>
                    </a>
                </li>
            </ul>

        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<?php $this->endBlock()?>

<div class="web-tiket-events-index">


    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'tiketEventsID',
//            'tiketEventsEventsID',
//            'tiketEventsUserID',
            [
                'attribute' => 'tiketEventsUserID',
                'value' => function($model){
                    return \common\models\User::findOne($model->tiketEventsUserID)['nama'];
                }
            ],
            [
                'attribute' => 'Email',
                'value' => function($model){
                    return \common\models\User::findOne($model->tiketEventsUserID)['email'];
                }
            ],
            'tiketEventsStatus:ntext',

//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
