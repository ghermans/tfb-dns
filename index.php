<?php
  /**
 * Dit is het algemeen blad om DNS oefeningen uit te voeren
 * Dit zowel voor DNS, ReverseDNS als spamcontroles uit te voeren
 */

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Glenn Hermans" >

    <title>Telenet for Business - DNS tools</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/main.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Wrap all page content here -->

      <div class="main-wrapper">
        <div class="container">
      <!-- Fixed navbar -->
      <img src="img/logo.png" alt="" />
      <header>
      <div class="navbar navbar-default">

          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
              <li><a href="http://grproductions.be/portal_new/modules/dns/"><i class="icon-home icon-large"></i> Home</a></li>
              <li><a href="#"><i class="icon-info"></i> Documentatie</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-globe icon-large"></i> Domeinen <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="?page=dns">DNS lookup</a></li>
                  <li><a href="?page=dns&go=ptr">Reverse dns lookup</a></li>
                  <li class="divider"></li>
                  <li class="dropdown-header">Domein informatie</li>
                  <li><a href="?page=dns&go=whois">Whois</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-envelope-alt icon-large"></i> E-mail <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="?page=mail">SMTP test</a></li>
                  <li><a href="?page=dns&go=dnsbl">SPAM controle</a></li>
                  <li class="divider"></li>
                  <li class="dropdown-header">Customer tools</li>
                  <li><a href="http://webmail.telenet.be">Telenet Webmail</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-signal icon-large"></i> Netwerk <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="?page=net&go=ping">Ping test</a></li>
                  <li><a href="?page=net&go=nmap">Poort scanner</a></li>
                </ul>
              </li>
            </ul>
          </div><!--/.nav-collapse -->

      </div>
       </header>

      <!-- Begin page content -->
   <div class="maincontent">


   <?php

// include "header.php";

//securityRedirect();

if (isset($_GET['page']))
  {

$pageid = $_GET['page'];
$filename = '/include/$pageid.php';
if($_GET['page'] == $pageid){
if(file_exists("include/$pageid.php"))
{
    include "include/$pageid.php";
}    else
    {
    include "include/error404.php";
    }
    }
    }else
    {
   ?>



      <div class="page-header">
                <h1>DNS&nbsp;tools</h1>
      </div>
<div class="col-sm-3">
<ul class="list-group">
  <li class="list-group-item"><a href="?page=doc"><i class="icon-info"></i> Documentatie</a></li>
  <li class="list-group-item"><a href="?page=dns"><i class="icon-globe"></i> Domeinen</a></li>
  <li class="list-group-item"><a href="?page=mail"><i class="icon-envelope-alt"></i> E-mail</a></li>
  <li class="list-group-item"><a href="?page=net"><i class="icon-signal"></i> Netwerk</a></li>
</ul>

</div>
<div class="col-sm-9">
     <div class="col-sm-12">
     <div class="panel panel-default">
       <div class="panel-heading">Laatste nieuws</div>
  <div class="panel-body">
<div class="list-group">
  <a href="#" class="list-group-item">
    <h4 class="list-group-item-heading">08/09/2013 Upgrade bootstrap & web interface </h4>
   </a>

</div>

    </div>
    </div>

    </div>
     </div>
    <?php
      }

//  include "footer.php";
?>

            </div>

     <div id="footer">
      <div class="container">
        <p align="center" class="text-muted credit">Telenet for Business - DNS&nbsp;tools v2.0 <a href="mailto:glenn.hermans@staff.telenet.be">Hermans Glenn</a>.</p>
      </div>
    </div>

   </div>
   </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
    jQuery(function($) {
$('form[data-async]').live('submit', function(event) {
var $form = $(this);
var $target = $($form.attr('data-target'));

$.ajax({
type: $form.attr('method'),
url: $form.attr('action'),
data: $form.serialize(),

success: function(data, status) {
$target.html(data);
}
});

event.preventDefault();
});
});

    </script>

  </body>
</html>
