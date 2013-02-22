<table class="table table-hover">
    <thead>
    	<tr>
		    <th>ID</th>
		    <th>Menu Naam</th>
		    <th>Titel</th>
		    <th>Aangemaakt op</th>
		    <th>Gewijzigd op</th>
		    <th>Acties</th>
	    </tr>
	</thead>
	<tbody>
		<?php foreach ( $pages as $page ): ?>
		<tr>
			<td><?php echo $page->id;  ?></td>
			<td><?php echo $page->menu_name; ?></td>
			<td><?php echo $page->title; ?></td>
			<td><?php echo $page->created_at; ?></td>
			<td><?php echo $page->updated_at; ?></td>						
			<td>
				<a href="admin/pages/edit/<?php echo $page->id ?>"><i class="icon-edit"></i> Bewerken </a>
				<a href="admin/pages/info/<?php echo $page->id ?>"><i class="icon-eye-open"></i> Informatie </a>
				<a href="admin/pages/delete/<?php echo $page->id ?>"><i class="icon-remove"></i> Verwijderen </a>
			<td>
	    </tr>
		<?php endforeach; ?>
	</tbody>
</table>

<div class="form-actions">
	<a class="btn" href="admin/pages/edit"><i class="icon-list-alt"></i> Pagina Toevoegen</a>
</div>