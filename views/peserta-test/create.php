<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PesertaTest */

$this->title = 'Create Peserta Test';
$this->params['breadcrumbs'][] = ['label' => 'Peserta Tests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peserta-test-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
