<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Account;


?>

<div class="panel panel-primary">
	<div class="panel-heading">Login</div>
	<div class="panel-body">
		
	<?php $f = ActiveForm::begin(); ?>
	<?= $f->field($account, 'username'); ?>
	<?= $f->field($account, 'password')->passwordInput(); ?>
	<div class="form-group">
		<?= Html::submitButton('Login Now', ['class' => 'btn btn-primary']) ?>
	</div>
	<?php ActiveForm::end(); ?>

	</div>
</div>