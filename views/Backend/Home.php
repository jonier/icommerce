<?php
	use yii\web\Session;

	$session = new Session();
	$session->open();
?>

<div class="panel">
	<div class="panel-body">
		<h2>
			Welcom: <?= $session['account_name']; ?>
		</h2>
	</div>
</div>

