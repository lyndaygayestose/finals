<?php
use yii\helpers\Html;
?>

<h1>
	<span class="pull-left">
    <?= Html::a('Create Biz',['/biz/create'],
    ['class'=>'btn btn-primary ']); ?>
	</span>
</h1>
    

<table class="table table-borderd table-stripped">
	<tr>
		<th>Name</th>
		<th>Categories</th>
	</tr>

	<?php foreach ($biz as $bizs): ?> 
		<tr>
            <th><?=Html::a($bizs->businesses->name,['/biz/view','id'=> $bizs ->id])?></th>
            <th><?= $bizs->category_id?></th>
		</tr>
		<?php endforeach; ?>
</table>

