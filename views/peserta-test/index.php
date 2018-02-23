<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\export\ExportMenu;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PesertaTestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Peserta Tests';
$this->params['breadcrumbs'][] = ['label' => 'Ujians', 'url' => ['/ujian/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peserta-test-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('tambah Peserta', ['create', 'idUjian' => $idUjian], ['class' => 'btn btn-success']) ?>
    </p>

    <?= 
                 ExportMenu::widget([
                    'dataProvider' => $dataProvider,
                    'target' => '_self',
                    'batchSize' => 0,
                    'columns' => [
                        'nama',
                        'email',
                        'password',
                    ],
                    'fontAwesome' => true,
                    'dropdownOptions' => [
                        'label' => 'Export',
                        // 'icon'=> '<i class="fa  fa-download" style="color:#fff;"></i>',
                        // 'style' => 'color:#fff;',

                        'class' => 'btn btn-block blue btn-default'
                    ],
                    'columnSelectorOptions'=>[
                        'label' => 'Filter',
                        'class' => 'btn btn-block btn-default',
                        
                    ]
                ]);
     ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_user',
            'id_ujian',
            'nama',
            'email:email',
            'password',
            'token',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
