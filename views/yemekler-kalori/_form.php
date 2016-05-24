<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\admin\models\Yemekler */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="yemekler-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'yemekName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kalori')->textInput() ?>

    <?= $form->field($model, 'ogunid')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
