<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SoalUjian */

$this->title = 'Create Soal Ujian';
$this->params['breadcrumbs'][] = ['label' => 'Ujian', 'url' => ['ujian/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="soal-ujian-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'idUjian' => $idUjian
    ]) ?>

</div>
