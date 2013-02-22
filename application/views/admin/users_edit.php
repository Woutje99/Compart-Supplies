<div>   


    <?php echo Form::open(null, null, array('class' => 'form form-horizontal')) ?>

    <?php echo Form::Token(); ?>

        <div class="control-group">
            <?php echo Form::label('username', 'Gebruikersnaam', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo Form::text('username', $user->username); ?>
                <?php echo $errors->first('username','<span class="alert alert-error">:message</span>'); ?>
            </div>    
        </div>
        <div class="control-group">
            <?php echo Form::label('email', 'Emailadres', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo Form::text('email',  $user->email); ?>
                <?php echo $errors->first('email','<span class="alert alert-error">:message</span>'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo Form::label('password', 'Wachtwoord', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo Form::password('password'); ?>
                <?php echo $errors->first('password','<span class="alert alert-error">:message</span>'); ?>
            </div>
        </div>
        <div class="form-actions">
            <input type="submit" class="btn btn-primary" value="Opslaan"/> 
            <a href="admin/users/" class="btn">Annuleren</a>
        </div>

    <?php echo Form::close(); ?>

</div>    
