<?php //@session_start();
/*
	Check if a session user id exist or not. If not set redirect
	to login page. If the user session id exist and there's found
	$_GET['logout'] in the query string logout the user
*/
function checkUser()
{
	// if the session id is not set, redirect to login page
	if (!isset($_SESSION['memberid'])) {
		$_SESSION['indication'] = "1";
		header('Location: '.$_SESSION['parentURL']);
		//header('Location: index.php?msg=1');
		exit;
	}
	
	// the user want to logout
	if (isset($_GET['logout'])) {
		doLogout();
	}
}

function doLogout()
{

	if (isset($_SESSION['user_id'])) {
		unset($_SESSION['user_id']);
		unset($_SESSION['username']);
		unset($_SESSION['memberid']);
		unset($_SESSION['userpass']);
		
		//session_unregister('user_id');
		//session_unregister('username');
		//session_unregister('memberid');
		//session_unregister('userpass');
	}
	
		session_destroy();
	header('Location: index.php');
	exit;
}

/* Login */

function doLogin()
{
   // if we found an error save the error message in this variable
   $errorMessage = '';

   $userName = $_POST['txtUserName'];
   $password = md5($_POST['txtPassword']);

   // first, make sure the username & password are not empty
   if ($userName == '') {
      $errorMessage = 'You must enter your username';
   } else if ($password == '') {
      $errorMessage = 'You must enter the password';
   } else {
      // check the database and see if the username and
      // password combo do match
      $sql = "SELECT id, username
                  FROM member
                  WHERE username = '$userName' AND password = '$password'";
      $result = mysqli_query($dbConn, $sql);

      if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['user_id'] = $row['id'];
			$_SESSION['user_name'] = $row['username'];
			$_SESSION['memberid'] = $row['id'];
			$_SESSION['userpass'] = $_POST['txtPassword'];

            // log the time when the user last login
			$lastloginTime = time();
			
            $sql = "UPDATE member
                        SET lastlogin = '$lastloginTime'
                        WHERE id = '{$row['id']}'";
            mysqli_query($dbConn, $sql);

            // now that the user is verified we move on to the next page
            // if the user had been in the admin pages before we move to
            // the last page visited
           // if (isset($_SESSION['login_return_url'])) {
              //header('Location: ' . $_SESSION['login_return_url']);
			  //header('Location: index.php');
			  $errorMessage = 'You are login as: ' . $_SESSION['user_name'];
			  //header('Location: index.php');
			  echo "<script>window.parent.location='index.php';</script>";
             // exit;
           // } else {
             // header('Location: index.php');
              //exit;
           // }
      } else {
            $errorMessage = 'Wrong username or password';
      }

  }

  return $errorMessage;
}


/*
	Create the paging links
*/
function getPagingNav($sql, $pageNum, $rowsPerPage, $queryString = '')
{
	$result  = mysqli_query($dbConn, $sql) or die('Error, query failed. ' . mysql_error());
	$row     = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$numrows = $row['numrows'];
	
	// how many pages we have when using paging?
	$maxPage = ceil($numrows/$rowsPerPage);
	
	$self = $_SERVER['PHP_SELF'];
	
	// creating 'previous' and 'next' link
	// plus 'first page' and 'last page' link
	
	// print 'previous' link only if we're not
	// on page one
	if ($pageNum > 1)
	{
		$page = $pageNum - 1;
		$prev = " <a href=\"$self?page=$page{$queryString}\">[Prev]</a> ";
	
		$first = " <a href=\"$self?page=1{$queryString}\">[First Page]</a> ";
	}
	else
	{
		$prev  = ' [Prev] ';       // we're on page one, don't enable 'previous' link
		$first = ' [First Page] '; // nor 'first page' link
	}
	
	// print 'next' link only if we're not
	// on the last page
	if ($pageNum < $maxPage)
	{
		$page = $pageNum + 1;
		$next = " <a href=\"$self?page=$page{$queryString}\">[Next]</a> ";
	
		$last = " <a href=\"$self?page=$maxPage{$queryString}{$queryString}\">[Last Page]</a> ";
	}
	else
	{
		$next = ' [Next] ';      // we're on the last page, don't enable 'next' link
		$last = ' [Last Page] '; // nor 'last page' link
	}
	
	// return the page navigation link
	return $first . $prev . " Showing page <strong>$pageNum</strong> of <strong>$maxPage</strong> pages " . $next . $last; 
}

/******************************************************************************/

function select_number_of_words($input,$number_of_words){
	$output = '';
	$input = strip_tags($input);
	$input = explode(' ',$input);  // second parameter returns the string as an array.
	$totalWords = count($input);
	
	print_r($input);
		
	if ($number_of_words >= $totalWords) {
		for($i=0; $i < $totalWords ; $i++) {
			$output .=$input[$i].' ';
		}
	} else {
		for($i=0; $i< $number_of_words; $i++) {
			$output .=$input[$i].' ';
		}
	}	

	return trim($output); // cut off the last space.
}


function get_current_userId()
{
	$userid = $_SESSION['memberid'];
	$temp = explode('/',$_SERVER['REQUEST_URI']);
	if(strtolower($temp[2])=='subscribermenu' or strstr($_SERVER['REQUEST_URI'],'subscriber.php') or strstr($_SERVER['REQUEST_URI'],'sprofile') or strtolower($temp[2])=='splay')
	{
		$userid = $_SESSION['subscriber_memberid'];
	}
	else if(strtolower($temp[2])=='usermenu' or strstr($_SERVER['REQUEST_URI'],'index.php') or strstr($_SERVER['REQUEST_URI'],'profile') or strtolower($temp[2])=='play')
	{
		$userid = $_SESSION['memberid'];
	}
	return $userid;
}


function quote_smart($value)
{
   	
       $value = stripslashes($value);
   
  
	return mysqli_real_escape_string($value);
}

function alphanum($string)
{
	$new_string = preg_replace("/[^a-zA-Z0-9s[:space:]*]/", "", $string);
	return $new_string;
}

function getEmail($email){
	global $db;
	$dbem = mysqli_query($db, "SELECT phrase FROM `su_email_text` WHERE ident = '$email'");
	$res = mysqli_fetch_array($dbem);
	if(isset($res['phrase']))
		return $res['phrase'];
	else
		return "";
}

function checkPermission($fieldValue) {	
	if ($fieldValue == "0") {
		$urlRedirect = "<script>window.location.href='index.php?id=194'</script>";
?>
<!--<style type="text/css">

.style1 {
	font-family: Arial, Helvetica, sans-serif;
	color: #FF0000;
	font-size: 18px;
	font-weight: bold;
}

</style>

<table width="100%" height="300" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" class="style1">
		<img src="images/001_30.gif" width="24" height="24" alt="Warning" /><br> Sorry! You have no permission to acces this page</td>
  </tr>
</table>-->
<?	
	}  

 echo @$urlRedirect;		
}


/////////////// these are Statistics funtions //////////////////
function countRecords($table, $selectedFiled, $id, $db) {
	
	$sql    	 =  "SELECT * FROM $table WHERE $selectedFiled = '$id'";
	$result 	 =  mysqli_query($db, $sql);
	$totalRecord = 	mysqli_num_rows($result);
		
	return $totalRecord;	
}

// Overall Unique Visit
function countUniqueRecords($table, $distinctField, $selectedFiled, $id, $db) {
	
	$sql    	 =  "SELECT DISTINCT($distinctField) FROM $table WHERE $selectedFiled = '$id'";
	$result 	 =  mysqli_query($db, $sql);
	$totalRecord = 	mysqli_num_rows($result);
		
	return $totalRecord;	
}
// Daily Unique Visit
function countdailyUniqueRecords($table, $distinctField, $selectedFiled, $id,$dateField, $selectedDate, $db) {
	
	$sql    	 =  "SELECT DISTINCT($distinctField) FROM $table WHERE $selectedFiled = '$id' AND $dateField = '$selectedDate'";
	$result 	 =  mysqli_query($db, $sql);
	$totalRecord = 	mysqli_num_rows($result);
		
	return $totalRecord;	
}


//Overall Daily Visit
function countDailyRecords($table, $selectedFiled, $id, $dateField, $selectedDate, $db) {
	
	$sql    	 =  "SELECT * FROM $table WHERE $selectedFiled = '$id' AND $dateField = '$selectedDate'";
	$result 	 =  mysqli_query($db, $sql);
	$totalRecord = 	mysqli_num_rows($result);
		
	return $totalRecord;	
}

//////////////////////////////Statistics Functions End//////////////


//////////THESE FUNCTION WERE IN DATABASE.PHP fILE IN oLD sYSTEM/////////////////

function dbQuery($sql)
{
	$result = mysqli_query($db, $sql) or die(mysqli_error());
	
	return $result;
}

function dbAffectedRows()
{
	global $db;
	
	return mysqli_affected_rows($db);
}

function dbFetchArray($result, $resultType = MYSQLI_BOTH) {
	return mysqli_fetch_array($result, $resultType);
}

function dbFetchAssoc($result)
{
	return mysqli_fetch_assoc($result);
}

function dbFetchRow($result) 
{
	return mysqli_fetch_row($result);
}

function dbFreeResult($result)
{
	return mysqli_free_result($result);
}

function numRows($result)
{
	return mysqli_num_rows($result);
}

function fetchAll($result)
{
	return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function dbSelect($dbName)
{
	return mysqli_select_db($dbName);
}

function dbInsertId()
{
	return mysqli_insert_id();
}

/// from video setting.php page
function getSizeFile($url) {
    if (substr($url,0,4)=='http') {
        $x = array_change_key_case(get_headers($url, 1), CASE_LOWER);
        if ( strcasecmp($x[0], 'HTTP/1.1 200 OK') != 0 ) { $x = $x['content-length'][1]; }
        else { $x = $x['content-length']; }
    }
    else { $x = @filesize($url); }

    return formatBytes($x);
}


function formatBytes($bytes, $precision = 2) {
    $units = array('B', 'KB', 'MB', 'GB', 'TB');
  
    $bytes = max($bytes, 0);
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
    $pow = min($pow, count($units) - 1);
  
    $bytes /= pow(1024, $pow);
  
    return round($bytes, $precision) . ' ' . $units[$pow];
} 

if(!function_exists('flv_length'))
{
	//// get length of FLV vedio file in millisecond
	function flv_length($flv_file)
	{
	
		$flv = fopen($flv_file, "rb");
		@fseek($flv, -4, SEEK_END);
		$arr = unpack('N', fread($flv, 4));
		$last_tag_offset = $arr[1];
		@fseek($flv, -($last_tag_offset + 4), SEEK_END);
		@fseek($flv, 4, SEEK_CUR);
		$t0 = fread($flv, 3);
		$t1 = fread($flv, 1);
		$arr = unpack('N', $t1 . $t0);
		$milliseconds_duration = $arr[1];
		$milliseconds_duration=($milliseconds_duration/1000);
		
		return $milliseconds_duration;
	}
}


function url_encode($url)
{
	if('1' == '1')
	{
		return url_clean($url);
	}
	else 
	{
	
		$url = str_replace(' ', '_', $url);
		$url = urlencode($url);
		$url = urlencode($url);
		return $url;
	}
}

function url_clean($url)
{
	$rem = array('_', '!', '@', '#', '$', '%', '^', '*', '(', ')', '+', '=', '`', '~', ',', '.', '/', ';', '\'', '[', ']', '<', '>', '?', ':', '"', '{', '}');
	$url = trim($url);
	$url = str_replace($rem, '', $url);
	$url = str_replace('&', 'and', $url);
	$url = str_replace(' ', '_', $url);
	
	return $url;
}

///////////////for my favourites page

function checkhidemedia()
{
	global $db;
	global $loggedIn;
	$result = 0;
	$isAdmin = isset($_SESSION["privs"]) && $_SESSION["privs"] == 7;
	if (checkextra("Mature Content Agreement", 8) && !$isAdmin && $loggedIn) {
		$db->query("SELECT * FROM member WHERE username = '" . quote_smart($_SESSION["username"]) . "'");
		$userres = $db->fetch();
		$hidemature = $userres["hidemature"];
		if (0 < $hidemature) {
			$result = 1;
		}
	}
	return $result;
}

function getcategorypath($category = 0)
{
	global $db;
	$cat = "";
	if ($category != 0) {
		$dby = mysqli_query($db, "SELECT name, parent, `url` FROM category WHERE id = " . $category);
		$catres = mysqli_fetch_array($dby);
		$cat = url_encode($catres["name"]);
		$parent = "";
		$parentsparent = "";
		$level = 1;
		if ($catres["parent"] != 0) {
			$dby2 = mysqli_query($db, "SELECT `name`, `parent`,`url` from `category` WHERE id = '" . $catres["parent"] . "';");
			$subres = mysqli_fetch_array($dby2);;
			$parent = $subres["url"];
			$level = 2;
			if ($subres["parent"] != 0) {
				$dby3 = mysqli_query($db, "SELECT `name`, `url` from `category` WHERE id = '" . $subres["parent"] . "';");
				$subsubres = mysqli_fetch_array($dby3);;
				$parentsparent = $subsubres["url"];
				$level = 3;
			}
		}
		if ($level == 1) {
			$cat = "/" . $cat;
		}
		if ($level == 2) {
			$cat = "/" . $parent . "/_" . $cat;
		}
		if ($level == 3) {
			$cat = "/" . $parentsparent . "/_" . $parent . "/__" . $cat;
		}
	} else {
		$cat = "";
	}
	return $cat;
}
function force_length($string, $length)
{
	if ($length < strlen($string)) {
		$string = substr($string, 0, $length - 3) . "...";
	}
	return $string;
}
function gettaglinks($tags)
{
	global $sitepath;
	$tagwords = explode(",", $tags);
	$taglinks = "&nbsp;&nbsp;";
	foreach ($tagwords as $tagword) {
		$taglinks .= "<a href='" . $sitepath . "search/" . urlencode($tagword) . "" . "'>" . $tagword . "</a>&nbsp;";
	}
	return $taglinks;
}
////////////////// fav ////////////////
function matureagreement()
{
	global $sitepath;
	$pageurl = "http://" . $_SERVER["SERVER_NAME"];
	if (isset($_SESSION["url"])) {
		$pageurl .= $_SESSION["url"];
	}
	if (isset($_SERVER["HTTP_REFERER"])) {
		$referrer = $_SERVER["HTTP_REFERER"];
	}
	$result = "<form action='' method='POST'>";
	$result .= "<h2 align=center><b>Mature Content Agreement</b></h2><div align=center><table width=450px><tr><td align=center><b>";
	$result .= checkextrasetting("Mature Content Agreement", 1);
	$result .= "</b></td></tr><tr><td>&nbsp;</td></tr><tr><td align=center><input type='submit' name='matureagree' value='Agree and Continue' class='biggerbutton'></td></tr><tr><td>&nbsp;</td></tr><tr><td align=center><a href='" . $referrer . "'>No thanks!</a></td></tr></table></div></form>";
	return $result;
}



function apply_word_censor2($text)
{
	$modactive = checkextra("Bad Words Filter", 10);
	$texttofilter = $text;
	if ($modactive) {
		$content = getfilecontents("includes/badwords.inc");
		$censorwords = explode("\n", $content);
		foreach ($censorwords as $block) {
			$block = strtolower($block);
			$block = str_replace("\r", "", $block);
			$block = str_replace("\n", "", $block);
			if ($block != "") {
				$wordSearch = "";
				$i = 0;
				while ($i < strlen($block)) {
					$letter = substr($block, $i, 1);
					if (strlen($letter) != 0 && $letter != " ") {
						$wordSearch .= $letter;
						if ($i < strlen($block)) {
							$wordSearch .= "[^A-z]*";
						}
					}
					$i++;
				}
				if (strlen($wordSearch) != 0) {
					$strReplace = substr($block, 0, 1);
					$i = 1;
					while ($i < strlen($block)) {
						$strReplace .= "*";
						$i++;
					}
					$texttofilter = eregi_replace($wordSearch, $strReplace, $texttofilter);
				}
			}
		}
	}
	return $texttofilter;
}

function generateCode($characters) 
{
    /* list all possible characters, similar looking characters and vowels have been removed */
    $possible = 'abcdefghjklmn456789opqrsituvwxyz0123459ABCDEFGHJKLMNOPQR0123456789SITUVWXYZ0123456789';
    $code = '';
    $i = 0;
    while ($i < $characters) {
        $code .= substr($possible, mt_rand(0, strlen($possible)-1), 1);
        $i++;
    }
    return $code;
}