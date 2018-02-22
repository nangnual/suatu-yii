<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JawabanPeserta */

$this->title = 'Update Jawaban Peserta: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Jawaban Pesertas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jawaban-peserta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
