<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SoalUjianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Soal Ujian';
$this->params['breadcrumbs'][] = ['label' => 'Ujian', 'url' => ['ujian/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="soal-ujian-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php Pjax::begin(); ?> 
    <p>
        <?= Html::a('Tambah Soal ', ['create', 'idUjian' => $idUjian], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_ujian',
            'soal:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
