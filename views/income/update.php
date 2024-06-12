<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\IncomeTab $model */

$this->title = 'Update Income Tab: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Income Tabs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="income-tab-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
