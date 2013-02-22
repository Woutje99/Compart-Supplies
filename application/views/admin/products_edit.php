<div>   


    <?php echo Form::open(null, null, array('class' => 'form form-horizontal')) ?>

    <?php echo Form::Token(); ?>

        <div class="control-group">
            <?php echo Form::label('merk', 'Merk', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo Form::text('merk', $product->merk); ?>
                 <?php echo $errors->first('merk','<span class="alert alert-error">:message</span>'); ?>
            </div>    
        </div>
        <div class="control-group">
            <?php echo Form::label('details', 'Details', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo Form::text('details', $product->details); ?>
                <?php echo $errors->first('details','<span class="alert alert-error">:message</span>'); ?>  
            </div>
        </div>
        <div class="control-group">
            <?php echo Form::label('model', 'Model', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo Form::text('model', $product->model); ?>
                 <?php echo $errors->first('model','<span class="alert alert-error">:message</span>'); ?>                
            </div>
        </div>    
        <div class="control-group">
            <?php echo Form::label('prijs', 'Prijs', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo Form::text('prijs', $product->prijs); ?>
                 <?php echo $errors->first('prijs','<span class="alert alert-error">:message</span>'); ?>                
            </div>
        </div>

        <hr>

        <div class="control-group">
            <?php echo Form::label('stock', 'Voorraad', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo Form::text('stock', $product->stock); ?>
                 <?php echo $errors->first('stock','<span class="alert alert-error">:message</span>'); ?>                
            </div>
        </div>



        <div class="form-actions">
            <input type="submit" class="btn btn-primary" value="Opslaan"/> 
            <a href="admin/products/" class="btn">Annuleren</a>
        </div>

    <?php echo Form::close(); ?>

</div>    
