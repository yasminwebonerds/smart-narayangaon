<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Vendor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vendor-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>


<div class="row">
<div class="col-md-4">
    <?= $form->field($model, 'date')->widget(\yii\jui\DatePicker::classname(), [
    'dateFormat'=>'yyyy-MM-dd',
    //'language' => 'ru',
    //'dateFormat' => 'yyyy-MM-dd',
    'options'=>['class'=>'form-control']
]) ?>

    <?= $form->field($model, 'shop_name')->textInput(['maxlength' => true]) ?>

     <?php $data = ArrayHelper::map(\common\models\Categories::find()->where(['parent_id'=>0])->asArray()->all(),'id','category_name');
    ?>
    <? echo $form->field($model, 'category_id')->dropDownList($data,
        ['prompt'=>'Select Category','multiple'=>'multiple']);?>

   <?php $data = ArrayHelper::map(\common\models\Categories::find()->where(['!=','parent_id',0])->asArray()->all(),'id','category_name');
    ?>
    <? echo $form->field($model, 'subcategory_id')->dropDownList($data,
        ['multiple'=>'multiple','prompt'=>'Select Category']);?>
   

    <?= $form->field($model, 'shop_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shop_image')->fileInput(['maxlength' => true]) ?>
</div>
<div class="col-md-4">

    <?= $form->field($model, 'time_from')->textInput() ?>

    <?= $form->field($model, 'time_to')->textInput() ?>

    <?= $form->field($model, 'weekly_off')->dropdownList(['Sunday' => 'Sunday', 'Monday' => 'Monday','Tuesday' => 'Tuesday','Wedensday' => 'Wedensday','Thursday' => 'Thursday','Friday' => 'Friday','Saturday' => 'Saturday'], ['prompt' => '---Select Data---']) ?>

    <?= $form->field($model, 'shop_owner')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textArea(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>
</div>

<div class="col-md-4">

    <?= $form->field($model, 'opt_mobileno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'opt_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'map_location')->textInput() ?>

    <?= $form->field($model, 'collected_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'webingeer_coupon')->dropDownList([ 'Yes' => 'Yes', 'No' => 'No', ], ['prompt' => '']) ?>

    <div class="form-group text-right">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success ' : 'btn btn-primary']) ?>
    </div>
</div>
</div>
    <?php ActiveForm::end(); ?>

</div>
