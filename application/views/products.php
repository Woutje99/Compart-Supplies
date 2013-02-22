<table class="table table-hover">
    <thead>
    	<tr>
		    <th>Afbeelding</th>
		    <th>Merk</th>
		    <th>Model</th>
		    <th>Prijs</th>
		    <th>Acties</th>
	    </tr>
	</thead>
	<tbody>
		<?php foreach ( $products as $product ): ?>
		<tr>
			<td><?php echo $product->image; ?></td>
			<td><?php echo $product->merk; ?></td>
			<td><?php echo $product->model; ?></td>
			<td><?php echo $product->prijs; ?></td>						
			<td>
				<a href="products/product/<?php echo $product->id ?>"><i class="icon-edit"></i> Meer </a>
			<td>
	    </tr>
		<?php endforeach; ?>
	</tbody>
</table>