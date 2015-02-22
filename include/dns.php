                <div class="row">
                    <div class="col-sm-12">
<?php
$dnstypes	= array(
'A',
'AAA',
'ANY', 
'CNAME',
'MX',
'NS',
'SOA',
'TXT',
'SRV');

if (isset($_GET['go']))
  {
 $goid = $_GET['go'];
if($_GET['go'] == $goid){
if(file_exists("include/files/dns/$goid.php"))
{
    include "include/files/dns/$goid.php";
}    else
    {
    include "include/error404.php";
    }
    }
    }else
    {
     include "include/files/dns/lookup.php";
    }
?>

</div>
</div>
