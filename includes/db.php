<?php

@session_start();
	ob_start();
	
	## Hataları Gizle ##
	error_reporting(0);
	
try {
     $db = new PDO("mysql:host=localhost;dbname=blog;charset=utf8", "root", "");
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch ( PDOException $e ){
     print $e->getMessage();
}
?>