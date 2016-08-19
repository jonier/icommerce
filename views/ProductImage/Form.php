<?php 
	use yii\widgets\ActiveForm;
 ?>

 <div class="pabel">
 	<div class="panel-body">
 		<h4>Prduct Image</h4>
 		<hr>
		<?php $f = ActiveForm::begin([
			'action'  => 'index.php?r=productimage/form&product_id='.$product->id, 
			' option' => ['enctype' => 'multipart/form-data']
		]): ?>
		<?= $f->field($productImage, 'name'); ?>
		<?= $f->field($productImage, 'url')->fileInput(); ?>

		<div class="form-group">
			<input type="submit" value="Save" class="btn btn-primary">
		</div>
		<?php ActiveForm::end(); ?>
 	</div>
 </div>