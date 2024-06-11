<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Expense $model */


// Convert time(H:i:s) from timestamp
$updated_time = $model->updated_at;
$model->updated_at = date("d-m-Y | H:i:s", $updated_time);

$created_time = $model->created_at;
$model->created_at = date("d-m-Y | H:i:s", $created_time);



$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Expenses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="expense-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            // 'title',
            'amount',
            'spent',
            'remianing',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::button('Go Back', ['class' => 'btn btn-success', 'onclick' => 'history.go(-1);']); ?>
    </p>

</div>
