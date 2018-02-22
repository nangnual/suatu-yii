<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\JawabanPeserta */

$this->title = 'Create Jawaban Peserta';
$this->params['breadcrumbs'][] = ['label' => 'Jawaban Pesertas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jawaban-peserta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
