                            <div class="col-sm-12">
<?php
if (isset($_GET['go']))
  {
 $goid = $_GET['go'];
$filename = '/include/$goid.php';
if($_GET['go'] == $goid){
if(file_exists("include/files/netwerk/$goid.php"))
{
    include "include/files/netwerk/$goid.php";
}    else
    {
    include "include/error404.php";
    }
    }
    }else
    {
     include "include/home.php";
    }
?>

</div>