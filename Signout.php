<?php

session_start();
//require('db/core.php');

//if (isset($_SESSION['user_id']) )
	//unset($_SESSION['user_id']);
	
session_destroy();

setcookie("Username_ict", " ", time()-5184000);

header ("location: index.php");

?>
