<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\IncomeTab $model */

$this->title = 'Create Income Tab';
$this->params['breadcrumbs'][] = ['label' => 'Income Tabs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="income-tab-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
