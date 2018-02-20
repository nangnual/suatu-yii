<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ujian */

$this->title = 'Update Ujian: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Ujians', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ujian-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
