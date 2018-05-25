<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\models\Businesses;
use app\models\Categories;
use yii\widgets\ActiveForm;
?>
<h1>Update Your Producer</h1>

<div class="row">
	<div class="col-md-6">

		<?php $form = ActiveForm::begin() ?>

            <?php $form = ActiveForm::begin() ?>
			<?= $form->field($model,'business_id')->dropDownList(ArrayHelper::map(
				Businesses::find()->asArray()->all(), 'id','name',''))?>

            <?= $form->field($model,'category_id')->dropDownList(ArrayHelper::map(
				Categories::find()->asArray()->all(), 'id','title'))?>
			
			<<div class="form-group">
    	<?= Html::submitButton("Update Biz", ['class'=>'btn btn-primary']); ?>
			</div>


			<?php ActiveForm::end(); ?>
	</div>
</div>
