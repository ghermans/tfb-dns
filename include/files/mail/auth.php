		   <div class="well well-small">
          <h3>Mail authentication</h3>
          </div>

<form id="mailauth" action="" method="post" class="form-horizontal">
       <div class="control-group">
        <label class="control-label" for="type">Protocol</label>

        <div class="controls">
        <label class="radio">
         <input type="radio" name="type" id="imap"> IMAP
       </label>

        <label class="radio">
          <input type="radio" name="type" id="pop3"> POP3
       </label>

         </div>
          </div>
       <div class="control-group">
      <label class="control-label" for="email"><i class="splashy-contact_grey"></i></label>    
      <div class="controls">
        <input type="text" class="input-xlarge" name="email" id="email">
      </div>
    </div>

         <div class="control-group">
      <label class="control-label" for="wachtwoord"><i class="splashy-lock_large_locked"></i></label>
      <div class="controls">
        <input type="password" class="input-xlarge" name="wachtwoord" id="wachtwoord">
      </div>
    </div>
   <div class="controls">
	      <button type="submit" class="btn btn"><i class="icon-ok"></i> Controleren</button>
          <button type="reset" class="btn btn"><i class="icon-remove"></i> Alles leegmaken</button>
	      </div>

    </form>