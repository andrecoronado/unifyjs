<?php

//1. require class
require_once 'class.unifyjs.php';

//2. define path for our JSON and JS:
$GLOBALS['APP'] = $_SERVER['DOCUMENT_ROOT'].'/app';
$GLOBALS['APP_JSON'] = $GLOBALS['APP'].'/json';

//3. Create the class
$unifyJS=new unifyJS();
?>

<!DOCTYPE html>
	<html>
	  <head>
    </head>
    <body>

//your page

      //4. include new JS file
      <?php echo $unifyJS->echoJS(); ?>
    </body>
  </html>

