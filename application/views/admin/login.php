<?php if(!empty($error)):?>
    <div class="alert alert-error">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <i class="icon-lock"></i>
        <?php echo $error;?>
    </div>
<?php endif;?>
<div class="modal">
  <div class="modal-header">
    <h4>Inloggen - Content Management System - ComPart Supplies</h4>
  </div>
  <form class="form-horizontal" method="POST">
    <div class="modal-body"> 
      <div class="control-group">
        <label class="control-label" for="username ">Gebruikersnaam</label>
          <div class="controls">
            <input type="text" id="username" placeholder="Gebruikersnaam" name="username">
          </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="password">Wachtwoord</label>
          <div class="controls">
            <input type="password" id="password" placeholder="Wachtwoord" name="password">
          </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <label class="checkbox">
            <input type="checkbox"> Onthouden
          </label>  
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <input type="submit" href="#" value="Inloggen" class="btn btn-primary" />
    </div>        
  </form>
</div>    