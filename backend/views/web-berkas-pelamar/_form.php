<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WebBerkasPelamar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-berkas-pelamar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'berkasPelamarUserID')->textInput() ?>

    <?= $form->field($model, 'berkasPelamarNama')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'berkasPelamarFile')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'berkasPelamarStatus')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
