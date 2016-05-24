<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\admin\models\KaloriTable */

$this->title = 'Update Kalori Table: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kalori Tables', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kalori-table-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
