<?php
use yii\widgets\DetailView;
use yii\helpers\html;


$this->params['breadcrums'][] = ['label'=> 'Music','url'=>['/music/index']];
$this->params['breadcrums'][] = $model->businesses->name;

?>
<h1>View Your Music</h1>

<?= DetailView::widget([
'model' => $model,
'attributes' => [
'id',
'business_id',
'category_id'
]]); ?>

<div class="pull-right">
	<?= Html::a('Update Post',
            ['/biz/update','id'=>$model->id],
            ['class'=>'btn btn-primary']);?>
    <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this music?',
                'method' => 'post',
            ],
        ]) ?>
	
</div>
