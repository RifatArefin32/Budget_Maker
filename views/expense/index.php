<?php

use app\models\Expense;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ExpenseSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'My Budget';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expense-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            'title',
            'amount',
            'spent',
            'remianing',
            //'created_at',
            //'updated_at',
            // [
            //     'class' => ActionColumn::className(),
            //     'urlCreator' => function ($action, Expense $model, $key, $index, $column) {
            //         return Url::toRoute([$action, 'id' => $model->id]);
            //      }
            // ],
            // [
            //     'attribute' => 'Update',
            //     'label' => 'Update',
            //     'format' => 'raw',
            //     'value' => function ($model) {
            //         return Html::a('Update', ['expense/update', 'id' => $model->id], ['class' => 'btn btn-warning']);    
            //     },
            // ],
            [
                'attribute' => 'custom_actions',
                'label' => 'Custom Actions',
                'format' => 'raw',
                'value' => function ($model) {
                    $buttons = '';
    
                    // First button
                    $buttons .= Html::a('View', ['expense/view', 'id' => $model->id], ['class' => 'btn btn-primary']) . ' ';
    
                    // Second button
                    $buttons .= Html::a('Update', ['expense/update', 'id' => $model->id], ['class' => 'btn btn-warning']) . ' ';
    
                    // Third button
                    $buttons .= Html::a('Delete', ['expense/delete', 'id' => $model->id], ['class' => 'btn btn-success']);
    
                    return $buttons;
                },
            ],
        ],
    ]); ?>

    <p>
        <?= Html::a('Add New Expense Field', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


</div>
