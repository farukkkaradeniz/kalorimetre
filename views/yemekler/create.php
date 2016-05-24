<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\admin\models\KaloriTable */

$this->title = 'Create Kalori Table';
$this->params['breadcrumbs'][] = ['label' => 'Kalori Tables', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kalori-table-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
