<div>   

    <?php echo Form::open_for_files(null, null, array('class' => 'form form-horizontal')) ?>

    <?php echo Form::Token(); ?>

        <div class="control-group">
            <?php echo Form::label('file', 'XML file', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo Form::file('file'); ?>           
            </div>
        </div>        
         <div class="form-actions">
            <input type="submit" class="btn btn-primary" value="Import XML"/> 
        </div>               
    <?php echo Form::close(); ?>

</div>    

<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Merk</th>
            <th>Details</th>
            <th>Model</th>
            <th>Prijs</th>
            <th>Voorraad</th>
            <th>Aantal</th>
        </tr>
    </thead>
    <tbody>
        <?php echo Form::open(null, null, array('class' => 'form form-horizontal')) ?>
        <?php foreach( $supplierproducts as $product ): ?>
        <tr>
            <td><?php echo $product->id; ?></td>
            <td><?php echo $product->merk; ?></td>
            <td><?php echo $product->model; ?></td>
            <td><?php echo $product->details; ?></td>
            <td><?php echo '€ '.$product->prijs; ?></td>
            <td><?php echo $product->stock;  ?></td>
            <td><?php echo Form::input('number', 'test'); ?></td>
        </tr>
        <?php endforeach; ?>      
    </tbody>
</table>
<div class="form-actions">
    <input type="submit" class="btn btn-primary" value="Bestellen bij de leverancier"/> 
</div> 
<?php echo Form::close(); ?> 

