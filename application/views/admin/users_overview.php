<table class="table table-hover">
    <thead>
    	<tr>
		    <th>ID</th>
		    <th>Gebruikersnaam</th>
		    <th>E-mailadres</th>
		    <th>Opties</th>
	    </tr>
	</thead>
	<tbody>
		<?php foreach( $users as $user ): ?>
		<tr>
			<td><?php echo $user->id; ?></td>
			<td><?php echo $user->username; ?></td>
			<td><?php echo $user->email; ?></td>
			<td>
				<a href="admin/users/edit/<?php echo $user->id ?>"><i class="icon-edit"></i> Bewerken </a>
				<a href="admin/users/info/<?php echo $user->id ?>"><i class="icon-eye-open"></i> Informatie </a>
				<?php if($user->id != '1'):?>
					<a href="admin/users/delete/<?php echo $user->id ?>"><i class="icon-remove"></i> Verwijderen </a>
				<?php endif;?>			
			<td>
	    </tr>
		<?php endforeach; ?>		
	</tbody>
</table>

<div class="form-actions">
	<a class="btn" href="admin/users/edit"><i class="icon-user"></i> Gebruiker Toevoegen</a>
</div>