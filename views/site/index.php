<?php

use yii\helpers\Html;
/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Budget Maker</h1>

        <p class="lead">Make your monthy budget here</p>
        
        <p>
            <?php 
                if(Yii::$app->user->isGuest){
                    echo Html::a('Login First', ['site/login'], ['class'=> 'btn btn-success']);
                }
                else{
                    echo Html::a('Let\'s start', ['expense/index'], ['class' => 'btn btn-success']);
                }
            ?>
        </p> 
    </div>

    <div class="body-content">

        

    </div>
</div>
