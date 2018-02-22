<?php

use yii\helpers\Html;
use yii\helpers\Url;
// use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UjianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ujians';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ujian-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php Pjax::begin(); ?> 
    <p>
        <?= Html::a('Create Ujian', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'nama_test',
            'waktu_test',
            'durasi_test',
            [
                'label' => 'action',
                'format' => 'raw',
                'value' => function($model){
                    return '<a href="'. Url::to(['/soal-ujian/index', 'idUjian' => $model->id]) . '" class="btn btn-info">Daftar Soal</a>';
                }
            ],
            [
                'label' => 'action',
                'format' => 'raw',
                'value' => function($model){
                    return '<a href="'. Url::to(['/peserta-test/index', 'idUjian' => $model->id]) . '" class="btn btn-info">Daftar Peserta</a>';
                }
            ]
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
