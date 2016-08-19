<?php 
	use yii\web\Session;
	use yii\widgets\LinkPager;

	$session = new Session();
	$session->open();
 ?>

 <div class="panel">
 	<div class="panel-body">
 		<h4>Product</h4>
 		<hr>

 		<?php if(!empty($session->getFlash('message'))): ?>
 			<div class="alert alert-success">
 				<i class="glyphicon glyphicon-ok"></i>
 				<?php echo $session['message']; ?>
 			</div>
 		<?php endif; ?>
 		<a href="/product/form" class="btn btn-primary">
			<i class="glyphicon glyphicon-plus"></i>
			New Record
		</a>

		<table class="table table-striped table-bordered" style="margin-top:10px">
			<thead>
				<tr>
					<th style="text-align: right" width="50px">no</th>
					<th width="100px">barcode</th>
				</tr>
			</thead>
			
			<tbody>
				<?php foreach ($products as $product): ?>
					<tr>
						<td><?php echo $n++; ?></td>
						<td><?php echo $product->code; ?></td>
						<td><?php echo $product->name; ?></td>
						<td><?php echo $product->remark; ?></td>
						<td><?php echo $product->category->name; ?></td>
						<td style="text-align: right; width: 110px;">
							<?php echo number_format($product->price); ?>
						</td>
						<td style="text-align: right; width: 110px;">
							<?php echo number_format($product->cost); ?>
						</td>
						<td style="text-align: right; width: 110px;">
							<?php echo number_format($product->qty); ?>
						</td>

						<td style="text-align: center; width: 150px;">
							<a href="/productimage/index?id=<?php echo $product->id; ?>" class="btn btn-info">
								<i class="glyphicon glyphicon-picture"></i>
							</a>
							<a href="/product/form?id=<?php echo $product->id; ?>" class="btn btn-success"> 
								<i class="glyphicon glyphicon-pencil"></i> 
							</a>
							<a href="/product/delete?id=<?php echo $product->id; ?>" class="btn btn-danger" onclick="return confirm('Are you sure delete data?')"> 
								<i class="glyphicon glyphicon-remove"></i> 
							</a>
						</td>
					</tr>
				<?php endforeach; ?>

			</tbody>
		</table>
		<?php 
			echo LinkPager::widget([
				'pagination' => $pages,
				]);
		?>
 	</div>
 </div>