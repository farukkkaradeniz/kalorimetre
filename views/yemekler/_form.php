<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use farukkkaradeniz\kalorimetre\models\Yemekler;
use farukkkaradeniz\kalorimetre\models\Ogun;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $model frontend\modules\admin\models\KaloriTable */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kalori-table-form">

    <?php $form = ActiveForm::begin(); ?>
    
        <?= $form->field($model, 'userid')->textInput(['readonly' => true, 'value' =>Yii::$app->user->identity->username])->label("Kullanıcı Adı") ?>
<?php $model->userid= Yii::$app->user->identity->id?>
<?= $form->field($model, 'meal')->dropDownList (
 ArrayHelper::map(Ogun::find()->all(), 'Name', 'Name'),
            ['prompt'=>'Öğün Seçiniz',
                'onchange'=>'$.post("index.php?r=admin/yemekler-kalori/lists&ogun='.'"+$(this).val(), function(data){
                    $("select#kaloritable-yemekname").html(data);});'
                ])->label("Öğün Seçiniz") ?>
    
    <?= $form->field($model, 'YemekName')->dropDownList(
 ArrayHelper::map(Yemekler::find()->all(), 'yemekName', 'yemekName'),
            ['prompt'=>'Yemek Seçiniz',
               'onchange'=>'$.post("index.php?r=admin/yemekler-kalori/kalori&yemekName='.'"+$(this).val(), function(data){
                    $("#kaloritable-kalori").html(data);});'
                ])->label("Yemek Seçiniz")  ?>

    
    <?= $form->field($model, 'Tarih')->widget(DatePicker::className(), [
    'inline' => false, 
    'clientOptions' => [
        'autoclose' => true,
        'format' => 'yyyy-m-dd',
        'startDate' => date('1960-01-01'),
        'endDate' => date(''),
    ],
]) ?>
    <?= $form->field($model, 'kalori')->dropDownList(
            ['prompt'=>'kalori değeri',
                ])->label("kalori")?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
