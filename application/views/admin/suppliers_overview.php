<table class="table table-hover">
    <thead>
    	<tr>
		    <th>ID</th>
		    <th>Bedrijfsnaam</th>
		    <th>Stad</th>
		    <th>Opties</th>
	    </tr>
	</thead>
	<tbody>
		<?php foreach( $suppliers as $supplier ): ?>
		<tr>
			<td><?php echo $supplier->id; ?></td>
			<td><?php echo $supplier->company_name; ?></td>
			<td><?php echo $supplier->town; ?></td>
			<td>
				<a href="admin/suppliers/products/<?php echo $supplier->id ?>"><i class="icon-tags"></i> Producten importeren </a>
				<!-- <a href="admin/suppliers/edit/<?php echo $supplier->id ?>"><i class="icon-edit"></i> Bewerken </a>
				<a href="admin/suppliers/info/<?php echo $supplier->id ?>"><i class="icon-eye-open"></i> Informatie </a>
				<a href="admin/users/delete/<?php echo $supplier->id ?>"><i class="icon-remove"></i> Verwijderen </a> -->
	    </tr>
		<?php endforeach; ?>		
	</tbody>
</table>