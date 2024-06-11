<?php
use yii\bootstrap5\Html;
?>


<h1>Email: <?= basename($fileName) ?></h1>
<div>
    <?= $from ?> 
    <?= $subject ?> 
    <?= $date ?>
    <?= $body ?>
    
</div>
