<?php
/* @var $this yii\web\View */
?>
<br><br>

<div class="banner" style="width: 100%;">
    <img src="<?= Yii::$app->request->baseUrl ?>/../../backend/web/foto_events/<?= $event->eventsThumbnails;?>" alt="">
</div>
<div class="section" style="
        background-image:url('<?= Yii::$app->request->baseUrl ?>/themes/themes1/images/ppc/ppc_section-bg-01.png');
        padding-top:50px;padding-bottom: 20px;
        ">
    <div class="row animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s" data-offset="50">
        <h2 class="el-title"><?= $event->eventsJudul?></h2>
        <div class="divider float-left"></div>
    </div>
</div>
<div class="section" style="padding: 50px 0">
    <div class="row animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s" data-offset="50">
        <div class="large-6 column">
            <div class="large-2 large-offset-2 column text-center p-t-20 p-l-20"><h4 class="el-title"><i class="fa fa-suitcase fa-3x"></i></h4></div>
            <div class="large-8 column">
                <h3 class="el-title">60 Perusahaan</h3>
                <h4 class="el-subtitle">Perusahaan Yang Terdafatar Hingga Saat ini</h4>
            </div>

        </div>
        <div class="large-6 column">
            <div class="large-2 large-offset-2 column text-center p-t-20 p-l-20"><h4 class="el-title"><i class="fa fa-user fa-3x"></i></h4></div>
            <div class="large-8 column">
                <h3 class="el-title">+- 300 Pegunjung</h3>
                <h4 class="el-subtitle">Target pengunjung (Gratis)</h4>
            </div>
        </div>
    </div>
</div>


<div class="section" style="padding: 50px 0">
    <div class="row animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s" data-offset="50">
        <div class="large-6 column">
            <div class="large-2 large-offset-2 column text-center p-t-20 p-l-20"><h4 class="el-title"><i class="fa fa-clock-o fa-3x"></i></h4></div>
            <div class="large-8 column">
                <h3 class="el-title"><?= date('d', strtotime($event->eventsTanggalMulai))." - ". date('d F Y', strtotime($event->eventsTanggalSelesai))?></h3>
                <h4 class="el-subtitle">08.00 - 16.00 WIB</h4>
            </div>

        </div>
        <div class="large-6 column">
            <div class="large-2 large-offset-2 column text-center p-t-20 p-l-20"><h4 class="el-title"><i class="fa fa-map-marker fa-3x"></i></h4></div>
            <div class="large-8 column">
                <br>
                <h2 class="el-title"><?= $event->eventsLokasi?></h2>
            </div>

        </div>
    </div>
</div>
<hr>
<div class="row p-t-10">
    <div class="row animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s" data-offset="50">
    <header class="text-center">
        <h2 class="el-title"><span class="fa fa-calendar"></span></h2>
        <h1 class="el-title">Jadwal Acara</h1>
        <div class="divider"></div>
    </header>

    <ul class="timeline">
        <?php
        $count = 0;
        foreach ($jadwal as $item) :
                if ($count%2 == 0): ?>
                    <!-- Item 1 -->
                    <li>
                        <div class="direction-r">
                            <div class="flag-wrapper">
                                <span class="hexa"></span>
                                <span class="time-wrapper"><span class="time"><?= date('d F', strtotime($item->jadwalEventsTglMulai))." - ". date('d F', strtotime($item->jadwalEventsTglSelesai))?></span></span>
                            </div>
                            <div class="desc"><?= $item->jadwalEventsNama?></div>
                        </div>
                    </li>
                <?php else :?>
                    <!-- Item 1 -->
                    <li>
                        <div class="direction-l">
                            <div class="flag-wrapper">
                                <span class="hexa"></span>
                                <span class="time-wrapper"><span class="time"><?= date('d F', strtotime($item->jadwalEventsTglMulai))." - ". date('d F', strtotime($item->jadwalEventsTglSelesai))?></span></span>
                            </div>
                            <div class="desc"><?= $item->jadwalEventsNama?></div>
                        </div>
                    </li>
                <?php endif;
                $count++;
            endforeach;
        ?>
    </ul>
    </div>
</div>
<hr>
<div class="row">
    <h2 class="el-title">Artikel <?= ucwords($event->eventsJudul)?></h2>
    <div class="divider float-left"></div>
</div>