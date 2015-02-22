<?php
require_once 'Net/DNSBL.php';
$dnsbl = new Net_DNSBL();
$remoteIP = $_SERVER['REMOTE_ADDR'];
// $remoteIP = '81.70.69.193';
$dnsbl->setBlacklists(array('sbl-xbl.spamhaus.org', 'bl.spamcop.net'));
if ($dnsbl->isListed($remoteIP)) {
    var_dump($dnsbl->getDetails($_SERVER['REMOTE_ADDR']));
   var_dump($dnsbl->getTxt($_SERVER['REMOTE_ADDR']));
   var_dump($dnsbl->getListingBl($_SERVER['REMOTE_ADDR']));
   var_dump($dnsbl->getListingRecord($_SERVER['REMOTE_ADDR']));


}



?> 
