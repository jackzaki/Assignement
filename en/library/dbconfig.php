<?php
ini_set('display_errors', '0');
error_reporting(E_ERROR);
	
//////////// for local info ///////
$dbHost = 'localhost';
$dbUser = 'ummahhost_synew';
$dbPass = 'ummahhost_synew';
$dbName = 'ummahhost_synew';
////////// end info ///////
@define('WEB_DIR_RELATED_TO_ROOT', "/");

$db = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

// Change character set to utf8
mysqli_set_charset($db,"utf8");
//echo "Current character set is: " . mysqli_character_set_name($db);

if(!$db)
{
echo "Error Connection";
}
else{
$connected = "Successfully Connected";
}

$admin_side_folderName = "admin/uploads/";

$sitepath =  "https://" .$_SERVER['HTTP_HOST'] . WEB_DIR_RELATED_TO_ROOT . 'synew/';
$mediaPath =  $sitepath . $admin_side_folderName;

mysqli_query ("set Name 'utf8' ", $db); mysqli_query ('set character settings utf8', $db);  

?>