<?php

use yii\web\Session;
$session = new Session();
$session->open();

?>

<div class="panel">
	<div class="panel-body">
		<h4>Product Image</h4>		
		<hr>
		<div class="pull-left">
			<!-- Product Info -->
			<div>
				<?php echo $product->code; ?> :
				<?php echo $product->name; ?>
			</div>

			<!-- Flash Message -->
			<?php if(!empty($session->setFlash('message'))): ?>
				<div class="alert alert-success">
					<i class="glyphicon glyphicon-ok"></i>
					<?php echo $session['message']; ?>
				</div>
			<?php endif; ?>

			<div style="margin-top: 20px">
				<a href="index.php?r=productimage/form&product_id=<?php echo $product->id; ?>" class="btn btn-primary">
					<i class="glyphicon glyphicon-plus"></i>
					New Image
				</a>

				<!-- Image or Product -->
				<table class="table table-striped table-bordered" style="margin-top:10px;">
					<thead>
						<th width="40px" style="text-align: right">no</th>
						<th>Image</th>
						<th width="300px">Name</th>
						<th width="40px">&nbsp</th>
					</thead>
					<tbody>
						<?php foreach ($productImages as $productImage): ?>
							<tr>
								<td style="text-align: right"> <?php echo n++; ?> </td>
								<td>
									<img src="../uploads/<?php echo $productImage->url; ?> " width="150px" />
								</td>
								<td> <?php echo $productImage->name; ?> </td>
								<td style="text-align: center;">
									<a href="index.php?r=productimage/delete&id=<?php echo $productImage->id; ?> "
										onclick="return confirm('Are you sure delete?')" class="btn btn-danger">
										<i class="glyphicon glyphicon-remove"></i>	
									</a>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="pull-right">
			<?php if(!empty($product->img)) ?>
				<img src="../uploads/ <?php echo $product->img; ?> " width="250px">
			<?php endif; ?>
		</div>
		<div class="clearfix"></div>
	</div>
</div>