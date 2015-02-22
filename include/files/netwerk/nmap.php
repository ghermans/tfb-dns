 <div class="page-header">
  <h2>Poort scanner</h2>

</div>

						<form class="form-horizontal" id="nmap" action="" method="post">
 					     <div class="form-group">
                     <label class="col-lg-2 control-label" for="inputPassword">Server info</label>
                      <div class="col-lg-4">
                     	<input class="form-control" id="hostname" name="hostname" type="text" placeholder="hostname / ip" required>
 					        </div>
                   
                      <div class="col-lg-2">
                       <input class="form-control" id="poort" name="poort" type="text" placeholder="poort" required>
                       </div>
                                            
                      
                       </div>
 					       <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <div class="controls">

                        <button type="submit" name="easycheck" class="btn btn"><i class="icon-ok"></i> Controleren</button>
                        <button type="reset" name="reset" class="btn btn"><i class="icon-remove"></i> Alles leegmaken</button>
                       </div>
                       </div>
</div>
						</form>
	
<br>

   <?php
if ( $_SERVER['REQUEST_METHOD'] == 'POST') {
  $host = $_POST["hostname"];
  $port = $_POST["poort"];
 
if($_POST['poort']) {
   
echo "<pre>";
$checkconn = fsockopen($host, $port, $errno, $errstr, 10);
if(!$checkconn){
     echo '<p class="text-error">De opgegeven poort is niet bereikbaar</p>';
} else {	
    echo '<p class="text-success">De opgegeven poort is bereikbaar</p>';
}
   echo "</pre>";
           		   
}
}
 ?>
</div>
</div>