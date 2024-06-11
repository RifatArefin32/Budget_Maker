<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-about">
    
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        Budget Maker is a practice application to implement Basic REST API 
    </p>
    
    
    File Directory: <code><?= __FILE__ ?></code>
</div>
