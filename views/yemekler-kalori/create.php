<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\admin\models\Yemekler */

$this->title = 'Create Yemekler';
$this->params['breadcrumbs'][] = ['label' => 'Yemeklers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yemekler-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
