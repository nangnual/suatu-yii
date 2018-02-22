<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PesertaTest */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="peserta-test-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?> -->

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_ujian')->hiddenInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
