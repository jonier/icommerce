<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="panel">
	<div class="panel-body">
		<h4>
			<i class="<?php echo $icon; ?>"></i>
			<?php echo $title; ?>
		</h4>

		<?php $f = ActiveForm::begin(); ?>
		<?= $f->field($category, 'code'); ?>
		<?= $f->field($category, 'name'); ?>
		<?= $f->field($category, 'remark'); ?>
		<?= $f->field($category, 'id')->hiddenInput()->label(false); ?>
		<div class="from-group">
			<!--<input type="submit" value="Save" class="btn btn-primary"> -->
			<?= Html::submitButton('Save', ['class' => 'btn btn-primary']); ?>
		</div>
		<?php ActiveForm::end(); ?>

	</div>
</div>