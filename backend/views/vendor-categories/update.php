<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\VendorCategories */

$this->title = 'Update Vendor Categories: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Vendor Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vendor-categories-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
