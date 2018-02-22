<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JawabanPeserta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jawaban-peserta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_soal_ujian')->textInput() ?>

    <?= $form->field($model, 'jawaban')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'id_peserta_test')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
