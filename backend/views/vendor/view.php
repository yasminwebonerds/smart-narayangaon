<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Vendor */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Vendors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vendor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id',
            'date',
            'shop_name',
            'shop_address',
            [
                'attribute'=>'shop_image',
                'value'=>Yii::$app->params['imagePath'].$model->shop_image,
                'format' => ['image',['width'=>'300','height'=>'100']],
            ],
            'category_id',
            'subcategory_id',
            'time_from',
            'time_to',
            'weekly_off',
            'shop_owner',
            'description',
            'mobile',
            'opt_mobileno',
            'email:email',
            'opt_email:email',
            'map_location',
            'collected_by',
            'webingeer_coupon',
        ],
    ]) ?>

</div>
