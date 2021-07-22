<?php include_once 'common/header.php'?>
<main id="wrapper">
	<div class="row g-1">
		<h5 class="mb-3">Order Details</h5>
		<table class="table table-striped">
			<thead>
				<th>Package</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Sub Total</th>
			</thead>
			<tbody>
			<?php foreach ($results as $r): ?>
				<tr>
					<td>Package <?=$r->package?></td>
					<td>LKR <?=$r->price?></td>
					<td><?=$r->quantity?></td>
					<td>LKR <?=$r->sub_total?></td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
		<h5>Total = LKR <?=$user->total?></h5>
	</div>
</main>
<?php include_once 'common/footer.php'?>
