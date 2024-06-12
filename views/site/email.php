<?php
use yii\bootstrap5\Html;
?>


<h1>Email: <?= basename($fileName) ?></h1>
<div>
    From: <?= $from ?>  <br>
    Subject: <?= $subject ?> <br>
    Date: <?= $date ?> <br>
    Body: <?= $body ?> <br> 
</div>
