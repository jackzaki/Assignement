<?php

	require_once 'dbconfig.php';
	require_once 'functions.php';
	
	//session_start();
	
//////////////////////////////////////////////
// 			common functions  				//
//////////////////////////////////////////////
/*if(!function_exists("getting_Setting"))
{
	function getting_Setting($setting, $db)
	{
		echo $rs = mysqli_query($db, "SELECT `value` FROM `setting` WHERE `setting` = '$setting'");
		$res = mysqli_fetch_array($rs);
		return $res['value'];
	}
}*/

/////////Comment Quote Smart By rizwan on 13-9-2018
/*function quote_smart($value)
{
   if (get_magic_quotes_gpc()) 
   {
       $value = stripslashes($value);
   }
  
	return mysqli_real_escape_string($value);
}*/

function checking_Login($username, $password, $remember, $is_subscriber_user,$parent_id=0, $db) 
{
	$password = md5($password);
	$testcook = md5(uniqid (rand()));
	$is_subscriber_user=='1';
	if($is_subscriber_user=='1' or $is_subscriber_user==1)
	{
		$q = "SELECT * FROM su_member WHERE LOWER(username) = '" . strtolower($username) . "' AND password = '" . $password . "' and subscriber='".$is_subscriber_user."' and userapproved='1' and activationkey='0' and subscriber_parent='$parent_id'";
		$rs = mysqli_query($db, $q);	
		$result = mysqli_fetch_array($rs);
		
		if ( isset($result['id']) ) 
		{
			if($result['activationkey'] == "0" and $result['userapproved'] == "1")
			{
				mysqli_query($db, "UPDATE su_member SET cookie = '".$testcook."', lastlogin = '".time()."' WHERE id = ".$result['id']);
				$_SESSION['subscriber_cookie'] = $testcook;				
				setting_Sessions_subscriber($result, $remember);
				
				//print_r($result);
				
				//die();
				
				return 0;
			}
			else
			{								
				return 2;
			}
		} 
		else 
		{
			get_logouting_subscriber();
			return 1;
		}	
	}
	else if($is_subscriber_user=='0' or $is_subscriber_user==0)
	{
		  $q = "SELECT * FROM su_member WHERE LOWER(username) = '" . strtolower($username) . "' AND password = '" . $password . "' and subscriber='".$is_subscriber_user."' and activationkey='0' and banned='0'";
		$rs = mysqli_query($db, $q);	
		$result = mysqli_fetch_array($rs);
		
		if ( isset($result['id']) ) 
		{
			if($result['activationkey'] == "0")
			{
				 mysqli_query($db, "UPDATE su_member SET cookie = '".$testcook."', lastlogin = '".time()."' WHERE id = ".$result['id']);
				 $_SESSION['cookie'] = $testcook;				
				
				setting_Sessions($result, $remember);
					
				return 0;
			}
			else
			{								
				return 2;
			}
		} 
		else 
		{
			get_logouting();
			return 1;
		}
	}
} 


function leavePage($logged, $is_subscriber_user, $redirect_to_adminside_link,$parent_id=0)
{

	
	global $sitePath, $sitepath;
	
	$sitefolder = "/done4u/";
	$path = "http://" . $_SERVER['HTTP_HOST'] . '' .WEB_DIR_RELATED_TO_ROOT. substr($sitefolder,1);
	
	if(isset($_POST['refer']))
	{
		$_SESSION['url'] = $_POST['refer'];
	}
	
		
	
	
	if($logged == 0)
	{
		
	
	
		$accountpageon = "1";

		if ($accountpageon==1)
		{			
			if($is_subscriber_user=='1')
			{
				$_SESSION['subscriber_username'] = $_POST['user'];
					
				
								
				if($redirect_to_adminside_link=='')
				{
					
					
					if($_SESSION['NOT_REG_subscriber_to_area']=='podcasting')
					{
						echo "<script>window.location.href='".$path."subscriber.php?id=182';</script>";exit(0);
						//header('Location: ' . $path.'subscriber.php?id=182');		
					}
					else if($_SESSION['NOT_REG_subscriber_to_area']=='web_tv' or $_SESSION['NOT_REG_subscriber_to_area']=='both')
					{
						echo "<script>window.location.href='".$path."subscriber.php?id=5&logined=yes';</script>";exit(0);
						//header('Location: ' . $path.'subscriber.php?id=5&logined=yes');		
					}
				}
				else
				{
					echo "<script>window.location.href='".$path."subscriber.php?id=".$redirect_to_adminside_link."&logined=yes';</script>";exit(0);
					//header('Location: ' . $path.'subscriber.php?id='.$redirect_to_adminside_link.'&logined=yes');
				}
			}
			else
			{	
				$_SESSION['username'] = $_POST['user'];	
					
				if($redirect_to_adminside_link=='')
				{
					echo "<script>window.location.href='".$path."';</script>";exit(0);
					//header('Location: ' . $path);
				}
				else if($redirect_to_adminside_link!='')
				{
					echo "<script>window.location.href='../dashboard.php?logined=yes';</script>";exit(0);
					//header('Location: ' . $path.'index.php?id='.$redirect_to_adminside_link.'&logined=yes');
				}
			}
		}
		else
		{
			if(isset($_SESSION['url']))
			{
				$referrer = $_SESSION['url'];
				$referURL = !strpos($referrer,$path) ? $referrer : $path;
?>
				<script language="javascript" type="text/javascript">
					document.loaction.href='<?= $path.$referURL; ?>';
				</script>
<?php
			}
			else if(isset($_SERVER['HTTP_REFERER']))
			{
				$referrer =$_SERVER['HTTP_REFERER'];
				$referURL = !strpos($referrer,$path) ? $referrer : $path;
?>
				<script language="javascript" type="text/javascript">
					document.loaction.href='<?= $path.$referURL; ?>';
				</script>
<?php
			}
		}
	}
	else
	{
		if($logged == 2)
		{	
			$_SESSION['loginerr'] = "You have not activated your account yet, please check your e-mail and activate your account.";
		}
		else if($logged == 1)
		{
			$_SESSION['loginerr'] = "Wrong User name and/or password.";
		}
		
		if($is_subscriber_user=='1')
		{
			echo "<script>window.location.href='".$path."subscriber-login.php?parent_id=$parent_id&loginFailed=".$logged."';</script>";exit(0);
			//header("Location: ".$path."subscriber-login.php?loginFailed=$logged");
		}
		else
		{	
			/*echo "<script>window.location.href='".$path."admin-login.php?loginFailed=".$logged."';</script>";exit(0);*/
			header("Location: ../index.php?loginFailed=$logged");
		}
	}
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////



//////////////////////////////////////////////
// 			functions for reg users			//
//////////////////////////////////////////////
function setting_session_defaults() 
{
	$_SESSION['logged'] = false;
	$_SESSION['uid'] = 0;
	$_SESSION['parentId'] = 0;
	$_SESSION['username'] = '';
	$_SESSION['cookie'] = 0;
	$_SESSION['remember'] = false;
	$_SESSION['privs'] = 0;
	
	$_SESSION['user_id'] = '';
	$_SESSION['user_name'] = '';
	$_SESSION['memberid'] = '';
	$_SESSION['userpass'] = '';
	$_SESSION['userName'] = '';
	$_SESSION['login_user_email_address'] = '';			
	$_SESSION['diamond_user_id'] = '';
	
	$_SESSION['REG_is_subscriber_user'] = '';			
	$_SESSION['REG_subscriber_parent_user_id'] = '';
	$_SESSION['REG_subscriber_to_area'] = '';
	
	setcookie('vidlogin', @$cookie, time() - 60*60*6, '/');
}

function setting_Sessions(&$values, $remember, $init = true)
{
	$_SESSION['uid'] = $values['id'];
	$_SESSION['parentId'] = $values['parentid'];
	$_SESSION['sub_user_parentid'] = $values['parentid'];
	$_SESSION['username'] = $values['username'];
	$_SESSION['cookie'] = $values['cookie'];
	$_SESSION['logged'] = true;
	$_SESSION['privs'] = $values['privs'];
	
	 $_SESSION['user_id'] = $values['id'];
	$_SESSION['user_name'] = $values['username'];
	$_SESSION['memberid'] = $values['id'];
	$_SESSION['userpass'] = $_POST['pass'];
	$_SESSION['userName'] = $values['username'];
	$_SESSION['login_user_email_address'] = $values['email'];			
	$_SESSION['diamond_user_id'] = $values['id'];
	$_SESSION['package'] = $values['package'];
	$_SESSION['type'] = $values['type'];
	$_SESSION['REG_is_subscriber_user'] = $values['subscriber'];			
	$_SESSION['REG_subscriber_parent_user_id'] = $values['subscriber_parent'];
	$_SESSION['REG_subscriber_to_area'] = $values['subscriber_to'];

	if ($remember) 
	{
		updating_Cookies($values['cookie'], true);
	}
	
	if ($init) 
	{
		 $session = session_id();
		 $ip = $_SERVER['REMOTE_ADDR'];
		
		 $qq = "UPDATE su_member SET session = '".$session."', ip = '".$ip."' WHERE id = '".$values['id']."'";
		
		$re = mysqli_query($db, $qq);
			
	}
} 

function get_logouting() 
{
	setting_session_defaults();
}

function updating_Cookies($cookie, $save) 
{
	$_SESSION['cookie'] = $cookie;
	
	if ($save) 
	{
		$cookie = serialize(array($_SESSION['username'], $cookie) );
		setcookie('vidlogin', $cookie, time()+60*60*6, '/');
	}
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//////////////////////////////////////////////
// 			functions for subscribers		//
//////////////////////////////////////////////
function setting_session_defaults_subscriber() 
{
	$_SESSION['subscriber_logged'] = false;
	$_SESSION['subscriber_uid'] = 0;
	$_SESSION['subscriber_parentId'] = 0;
	$_SESSION['subscriber_username'] = '';
	$_SESSION['subscriber_cookie'] = 0;
	$_SESSION['subscriber_remember'] = false;
	$_SESSION['subscriber_privs'] = 0;
	
	$_SESSION['subscriber_user_id'] = '';
	$_SESSION['subscriber_user_name'] = '';
	$_SESSION['subscriber_memberid'] = '';
	$_SESSION['subscriber_member_id'] = '';
	$_SESSION['subscriber_userpass'] = '';
	$_SESSION['subscriber_userName'] = '';
	$_SESSION['subscriber_login_user_email_address'] = '';			
	$_SESSION['subscriber_diamond_user_id'] = '';
	
	$_SESSION['NOT_REG_is_subscriber_user'] = '';			
	$_SESSION['NOT_REG_subscriber_parent_user_id'] = '';
	$_SESSION['NOT_REG_subscriber_to_area'] = '';
	
	unset($_SESSION['user_id']);
	
	setcookie('vidlogin', @$cookie, time() - 60*60*6, '/');
}

function setting_Sessions_subscriber(&$values, $remember, $init = true)
{
	$_SESSION['subscriber_uid'] = $values['id'];
	$_SESSION['subscriber_parentId'] = $values['parentid'];
	$_SESSION['subscriber_username'] = htmlspecialchars($values['username']);
	$_SESSION['subscriber_cookie'] = $values['cookie'];
	$_SESSION['subscriber_logged'] = true;
	$_SESSION['subscriber_privs'] = $values['privs'];
	
	$_SESSION['subscriber_user_id'] = $values['id'];
	$_SESSION['subscriber_user_name'] = $values['username'];
	$_SESSION['subscriber_memberid'] = $values['id'];
	$_SESSION['subscriber_member_id'] = $values['id'];
	$_SESSION['subscriber_userpass'] = $_POST['pass'];
	$_SESSION['subscriber_userName'] = $values['username'];
	$_SESSION['subscriber_login_user_email_address'] = $values['email'];			
	$_SESSION['subscriber_diamond_user_id'] = $values['id'];
	
	$_SESSION['NOT_REG_is_subscriber_user'] = $values['subscriber'];			
	$_SESSION['NOT_REG_subscriber_parent_user_id'] = $values['subscriber_parent'];
	$_SESSION['NOT_REG_subscriber_to_area'] = $values['subscriber_to'];

	if ($remember) 
	{
		updating_Cookies_subscriber($values['subscriber_cookie'], true);
	}
	
	if ($init) 
	{
		$session = session_id();
		$ip = $_SERVER['REMOTE_ADDR'];

		mysqli_query($db, "UPDATE su_member SET session = '$session', ip = '$ip' WHERE id = '".$values['id']."'");	
	}
} 

function get_logouting_subscriber() 
{
	setting_session_defaults_subscriber();
}

function updating_Cookies_subscriber($cookie, $save) 
{
	$_SESSION['subscriber_cookie'] = $cookie;
	
	if ($save) 
	{
		$cookie = serialize(array($_SESSION['subscriber_username'], $cookie) );
		setcookie('subscriber_vidlogin', $cookie, time()+60*60*6, '/');
	}
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$username = $_POST['user'];
$password = $_POST['pass'];

$is_subscriber_user = 0;
//$isLogged = -1;
$remember = false;

$redirect_to_adminside_link = 'a';
$_POST['redirect_to_adminside_link'];
if(isset($_POST['redirect_to_adminside_link']) and $_POST['redirect_to_adminside_link']!='')
{
	$redirect_to_adminside_link = $_POST['redirect_to_adminside_link'];	
}

if(isset($_POST['is_subscriber_user']) and $_POST['is_subscriber_user']=='1')
{
	$is_subscriber_user = 1;
}
else
{
	$is_subscriber_user = 0;
}

if(isset($_POST['remember']))
{
	$remember = $_POST['remember'];
}	
if(isset($_POST['parent_id']))
{
	$parent_id = $_POST['parent_id'];
}	
 $isLogged=checking_Login($username, $password, $remember, $is_subscriber_user,$parent_id, $db);

leavePage($isLogged, $is_subscriber_user, $redirect_to_adminside_link,$parent_id);

?>