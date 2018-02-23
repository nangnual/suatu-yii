<?php

use yii\helpers\Html;
// use yii\widgets\ActiveForm;
use kartik\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Ujian */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ujian-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_test')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'waktu_test')->widget(DateTimePicker::className(), [
    	   // 'name' => $model->waktu_test,
	    'options' => ['placeholder' => 'Select operating time ...'],
        // 'convertFormat' => true,
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd H:i:s',
            // 'startDate' => '01-Mar-2014 12:00 AM',
            'todayHighlight' => true
        ]
        ]);?>

    <?= $form->field($model, 'durasi_test')->textInput() ?>
    <?= $form->field($model, 'instruksi')->textArea() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
