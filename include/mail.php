<?php
if (isset($_GET['go']))
  {
 $goid = $_GET['go'];
if($_GET['go'] == $goid){
if(file_exists("include/files/mail/$goid.php"))
{
    include "include/files/mail/$goid.php";
}    else
    {
    include "include/error404.php";
    }
    }
    }else
    {
     include "include/files/mail/smtp.php";
    }
?>

