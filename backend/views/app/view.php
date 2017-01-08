<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\App */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Apps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-view">

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
        //    'id',
            'name',
            
            [
                'attribute'=>'logo_image',
                'value'=>Yii::$app->params['imagePath'].$model->logo_image,
                'format' => ['image',['width'=>'300','height'=>'100']],
            ],
            'about_us:ntext',
            // 'created_by',
            // 'updated_by',
            // 'created_at',
            // 'updated_at',
            // 'is_deleted',
        ],
    ]) ?>

</div>
