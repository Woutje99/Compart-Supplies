<div class="pages_edit">

	<?php echo Form::open(null, null, array('class' => 'form form-horizontal')) ?> 

	<?php echo Form::Token(); ?>


	<div class="control-group">
		<?php echo Form::label('title', 'Titel', array('class' => 'control-label')); ?>
		<div class="controls">
			<?php echo Form::text('title', $page->title); ?>
		</div>
	</div>
	
	<div class="control-group">
		<?php echo Form::label('menu_name', 'Menuitem naam', array('class' => 'control-label')); ?>
		<div class="controls">
			<?php echo Form::text('menu_name', $page->menu_name); ?>
		</div>
	</div>
	
	<div class="control-group">
		<?php echo Form::label('identifier', 'Identifier', array('class' => 'control-label')); ?>
		<div class="controls">
			<?php echo Form::text('identifier', $page->identifier); ?>
		</div>
	</div>
	
	<div class="control-group full-width">
		<?php echo Form::label('content', 'Inhoud', array('class' => 'control-label')); ?>
		<div class="controls">
			<?php echo Form::textarea('content', $page->content, array('class'=>'ckeditor')); ?>
		</div>
	</div>


	<hr>

	<div class="control-group">
		<?php echo Form::label('meta_title', 'Pagina Titel', array('class' => 'control-label')); ?>
		<div class="controls">
			<?php echo Form::text('meta_title', $page->meta_title); ?>
			<br><i>De browser en tabblad titel</i>
		</div>
	</div>

	<hr>

	<div class="control-group">
		<div class="controls">
			<label class="checkbox">
				<?php echo Form::checkbox('is_active', null, $page->is_active); ?>
				Deze pagina bezoekbaar maken
				<br><i>Uitgevinkt betekendt dat niemand de pagina kan zien.</i>
			</label>
		</div>
	</div>
	
	<div class="control-group">
		<div class="controls">
			<label class="checkbox">
				<?php echo Form::checkbox('in_menu', null, $page->in_menu); ?>
				Weergeven in menu
			</label>
		</div>
	</div>

	<div class="form-actions">
		<input type="submit" class="btn btn-primary" value="Opslaan"/>
		<a href="admin/pages/" class="btn">Annuleren</a>
	</div>

	<?php echo Form::close(); ?>

</div>