<?php

use yii\helpers\Html;
use yii\helpers\Url;
// use yii\grid\GridView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UjianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ujians';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ujian-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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
                'format' => 'raw',
                'value' => function($model){
                    return '<a href="'. Url::to(['/soal-ujian/create', 'idUjian' => $model->id]) . '">Daftar Soal</a>';
                }
            ],
            [
                'format' => 'raw',
                'value' => function($model){
                    return '<a href="'. Url::to(['/peserta-test/create', 'idUjian' => $model->id]) . '">Daftar Peserta</a>';
                }
            ]
        ],
    ]); ?>
</div>
