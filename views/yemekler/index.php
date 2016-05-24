<?php

use yii\helpers\Html;
use yii\grid\GridView;
use miloschuman\highcharts\Highcharts;
use farukkkaradeniz\kalorimetre\controllers\YemeklerKaloriController;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\admin\models\KaloriTableSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kalori Tables';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kalori-table-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Kalori Table', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'userid',
            'YemekName',
            'meal',
            'Tarih',
            // 'kalori',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
    <?php 
    $id=0;
    $module=0;
    $config=0;
    $name=Yii::$app->user->identity->username;
    $sinif= new YemeklerKaloriController($id, $module, $config = []);
    $sabah=(int)$sinif->actionSabah();
    $ogle=(int)$sinif->actionOgle();
    $aksam=(int)$sinif->actionAksam();
    echo Highcharts::widget([
   'options' => [
      'title' => ['text' => 'Günlük Alınan Kalori Grafiği'],
      'xAxis' => [
         'categories' => ['Sabah', 'Öğle', 'Akşam']
      ],
      'yAxis' => [
         'title' => ['text' => 'Kalori Miktarı']
      ],
      'series' => [
         ['name' => $name, 'data' => [$sabah, $ogle, $aksam]],
         
      ]
   ]
]);
    ?>
    
</div>
