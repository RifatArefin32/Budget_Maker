<?php

use yii\helpers\Html;
/** @var yii\web\View $this */

// $updated_time = 1849368618;
// $updated_time = date("d-m-Y | H:i:s", $updated_time);
// var_dump($updated_time);
// die;

$this->title = 'Admin';
$this->params['breadcrumbs'][] = $this->title;
?>
<h3>Admin</h3>
<br>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Inbox</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <?php foreach ($emlFiles as $file): ?>
            <tr>
                <td><?= Html::encode(basename($file))?>
                <td><?= Html::a('Open', ['email', 'fileName' => basename($file)], ['class'=> 'btn btn-warning']) ?>
                <?= Html::a('Delete', ['email-delete', 'fileName' => basename($file)], ['class'=> 'btn btn-danger']) ?></td>
            </tr>
        <?php endforeach; ?>
    </tr>
  </tbody>
</table>



<ul>

</ul>


