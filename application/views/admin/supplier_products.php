<div>   

    <?php echo Form::open_for_files(null, null, array('class' => 'form form-horizontal')) ?>

    <?php echo Form::Token(); ?>

        <div class="control-group">
            <?php echo Form::label('username', 'CSV File:', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo Form::file('image'); ?>           
            </div>
        </div>        
    <?php echo Form::close(); ?>

</div>    



<!-- <div class="form-actions">
	<a class="btn" href="admin/users/edit"><i class="icon-user"></i> Gebruiker Toevoegen</a>
</div> -->