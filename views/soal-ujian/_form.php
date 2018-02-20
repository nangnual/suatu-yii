<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SoalUjian */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="soal-ujian-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_ujian')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'soal')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
