<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	use yii\web\Session;

	$session = new Session();
	$session->open();

?>

<div class="panel">
	<div class="panel-body">
		<h4><i class="glyphicon glyphicon-user"></i>Edit Account</h4>
		<hr>

		<?php if(!empty($session->getFlash('message'))): ?>
			<div class="alert alert-success">
				<i class="glyphicon glyphicon-ok"></i>
				<?php echo $session->getFlash('message'); ?>
			</div>
		<?php endif; ?>

		<?php $f = ActiveForm::begin(); ?>
		<?= $f->field($account, 'name'); ?>
		<?= $f->field($account, 'username'); ?>
		<?= $f->field($account, 'password')->passwordInput(); ?>
		<?= $f->field($account, 'email'); ?>
		<div class="form-group">
			<?= Html::submitButton('Save', ['class' => 'btn btn-primary']); ?>
		</div>
		<?php ActiveForm::end(); ?>


	</div>
</div>