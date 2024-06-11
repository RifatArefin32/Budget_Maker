<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-about">
    
    <h1><?= Html::encode($this->title) ?></h1>

    <div>
        <p>
            <br>
            Budget Maker is a practice application to implement Basic CRUD on Yii2 Framework and REST API as well.
            This application can be used to make your monthly budget of expense. You can create unlimited budget field. 
            Set the total amount of budget for that particular field and you can also update if you spend for a particular
            budget. You can view your remaining amount on a particular expense field as well. <br><br>
            <h4>Happy learning!</h4>

             
        </p>
    </div>
    
    
    <!-- File Directory: <code><?= __FILE__ ?></code> -->
</div>
