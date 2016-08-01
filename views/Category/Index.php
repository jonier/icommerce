<?php

	use yii\web\Session;
	
	$session = new Session();
	$session->open();

?>

<div class="panel">
	<div class="panel-body">
		<h4>Category</h4>
		<hr>

		<?php if(!empty($session->getFlash('message'))): ?>
			<div class="alert alert-success">
				<i class="glyphicon glyphicon-ok"></i>
				<?php echo $session['message']; ?>
			</div>
		<?php endif; ?>

		<a href="/category/form" class="btn btn-primary">
			<i class="glyphicon glyphicon-plus"></i>
			New Record
		</a>

		<table class="table table-striped table-bordered" style="margin-top:10px">
			<thead>
				<tr>
					<th style="text-align: right" width="50px">no</th>
					<th width="100px">code</th>
					<th>name</th>
					<th>remark</th>
					<th width="100px">&nbsp</th>
				</tr>
			</thead>
			
			<tbody>

				<?php foreach ($categories as $category): ?>
					<tr>
						<td><?php echo $n++; ?></td>
						<td><?php echo $category->code; ?></td>
						<td><?php echo $category->name; ?></td>
						<td><?php echo $category->remark; ?></td>
						<td style="text-align: center; width: 110px;">
							<a href="/category/edit?id=<?php echo $category->id; ?>" class="btn btn-success"> 
								<i class="glyphicon glyphicon-pencil"></i> 
							</a>
							<a href="/category/delete?id=<?php echo $category->id; ?>" class="btn btn-danger" onclick="return confirm('Are you sure delete data?')"> 
								<i class="glyphicon glyphicon-remove"></i> 
							</a>
						</td>
					</tr>
				<?php endforeach; ?>

			</tbody>
		</table>
	</div>
</div>