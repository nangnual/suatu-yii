<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Ujian */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ujian-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_test')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'waktu_test')->textInput() ?>

    <?= $form->field($model, 'durasi_test')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
