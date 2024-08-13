<?php
/* Database config */
$db_host		= '127.0.0.1:3306';
$db_user		= 'u393106330_admin';
$db_pass		= '123123123PDm!';
$db_database	= 'u393106330_ecommerceweb'; 

/* End config */

$db = new PDO('mysql:host='.$db_host.';dbname='.$db_database, $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>