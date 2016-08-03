<?php 
	use yii\bootstrap\ActiveForm;
	use yii\web\Session;

	$session = new Session();
	$session->open();

 ?>

<div class="panel">
	<div class="panel-body">
		<h4>
			<i class="<?php echo $icon; ?>"></i>
			<?php echo $title; ?>
		</h4>
		<hr>

 		<?php if(!empty($session->getFlash('message'))): ?>
 			<div class="alert alert-success">
 				<i class="glyphicon glyphicon-ok"></i>
 				<?php echo $session['message']; ?>
 			</div>
 		<?php endif; ?>

 		<?php $f = ActiveForm::begin([
 				'action' => '/product/form',
 				//'option' => ['enctype' => 'multipart/form-data'],
 				'layout' => 'horizontal',
 				'fieldConfig' => [
 					'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
 					'horizontalCssClasses' => [
 						'offset' => 'col-sm-offset-3',
 						'label' => 'col-sm-2 col-md-2',
 						'wrapper' => 'col-sm-9',
 						'error' => '',
 						'hint' => 'col-sm-3'
 					]
 				]
 			]); 

 			echo $f->field($product, 'category_id')
 				   ->dropdownList($categoryIds, ['style' => 'width:200px']) ;
 			echo $f->field($product, 'code')
 			       ->textInput(['style' => 'width:100px']);
 			echo $f->field($product, 'name')
 				   ->textInput(['style' => 'width:300px']);
 			echo $f->field($product, 'remark');
 			echo $f->field($product, 'detail');
 			echo $f->field($product, 'price')
 				   ->textInput(['style' => 'width:100px']);
 			echo $f->field($product, 'cost')
 				   ->textInput(['style' => 'width:100px']);
 			echo $f->field($product, 'qty')
 				   ->textInput(['style' => 'width:100px']);
 			echo $f->field($product, 'img')->fileInput();
 			echo $f->field($product, 'id')->hiddenInput()->label('false');

 		?>

 		<div class="form-group">
 			<label class="control-label col-sm-3 col-md-2"></label>
 			<div class="col-sm9 col-md-9">
 				<input type="submit" class="btn btn-primary" value"Save"></input>
 			</div>
 		</div>

 		<?php ActiveForm::end(); ?>


	</div>
</div>