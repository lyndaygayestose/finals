<?php

use yii\helpers\Html;


$this->title = "Categories";
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= $this->title?></h1>
<p>
        <?= Html::a('Create Categories', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
    </tr>
    <?php foreach($model as $model) : ?>
    <tr>
    
    <td>
            <?= Html::a($model->id, ['/categories/view', 'id'=>$model->id]); ?>
        <td><?= $model->title?></td>
        <td><?= $model->description?> </td>
    </tr>
    <?php endforeach; ?>
</table>
