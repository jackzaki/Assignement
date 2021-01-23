<? include_once("library/dbconfig.php");?>
<? include_once("library/functions.php");?>
<?php session_start();
extract($_REQUEST);

	if(isset($_REQUEST["value"]))
 {
	$pagename=$_REQUEST["value"];
	}else{	
	$pagename='homepage';
	}

$queryw="SELECT * FROM su_website_info WHERE website_language='en' ";
$resultw=mysqli_query($db, $queryw);
$roww=mysqli_fetch_array($resultw);
$website_title=stripslashes($roww["website_title"]);
$website_tagline=stripslashes($roww["website_tagline"]);
$website_email = $roww["website_email"];
$website_phone = $roww["website_phone"];
$website_footertext = stripslashes($roww["website_footertext"]);
$website_logodark = $roww["website_logodark"];
$website_logolight = $roww["website_logolight"];
$website_favicon = $roww["website_favicon"];
$website_facebook = $roww["website_facebook"];
$website_twitter = $roww["website_twitter"];
$website_youtube = $roww["website_youtube"];
$website_linkedin = $roww["website_linkedin"];
$website_instagram = $roww["website_instagram"];


$query="SELECT * FROM su_pages WHERE page_name='$pagename' and page_language='en' ";
$result=mysqli_query($db, $query);
$row=mysqli_fetch_array($result);

$page_title=stripslashes($row["page_title"]);
$page_detail=stripslashes($row["page_detail"]);
$page_img = $row["page_img"];

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="owlcarusel/owl.carousel.min.css" />
    <link rel="stylesheet" href="owlcarusel/owl.theme.default.min.css" />
    <link rel="stylesheet" href="css/fontello.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/slick.css"/>
    <link rel="stylesheet" type="text/css" href="css/fontawesome/css/fontawesome-all.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
   
    <title><?=$website_title;?></title>
</head>
<body>
    <div class="wrapper">

        <div class="header">
            <div class="navbar">
                <a href="<?=$sitepath;?>en/" class="logo">
                    <img alt="Sharjah Youth Logo" src="<?=$mediaPath.'logo/'.$website_logodark;?>" />
                </a>
                <div class="navmenu">
                    <div class="burgermenu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <a href="<?=$sitepath;?>en/"><?=$website_title;?></a>
                </div>
                <div class="language">
                    <div class="lang-content">
                        <a href="signin.php" class="login">
                            <span> Sign In </span><i class="icon-user-outline"> </i>
                        </a>
                        <a href="<?=$sitepath;?>" class="lang"><!--<img src="https://ummahhost.com/synew/images/uae.jpg" width="30">-->AR</a>
                        <a href="javascript:;" class="search"><img src="images/search.png" /></a>                        
                    </div>
                </div>
            </div>
            <div class="menu">
                <div class="menuColumn">
                    <div class="menuBlock">
                        <h4><a href="about.php">Who Are We </a></h4>
                        <ul>
                            <li><a href="about.php">About Sharjah Youth</a></li>
                            <li><a href="tracks.php">Our Tracks</a></li>
                            <li><a href="centers.php">Our Centers</a></li>
                        </ul>
                    </div>
                    <div class="menuBlock">
                        <h4><a href="javascript:;">Media Centers</a></h4>
                        <ul>
                            <li><a href="news.php">Our News</a></li>
                            <li><a href="gallery.php">Pictures</a></li>
                            <li><a href="videos.php">Videos</a></li>
                        </ul>
                    </div>
                </div>
                <div class="menuColumn">
                    <div class="menuBlock">
                        <h4><a href="register.php"> Membership  </a></h4>
                        <ul>
                            <li><a href="signin.php">Sign In</a></li>
                            <li><a href="himma-system.php">Himmah System</a></li>
                        </ul>
                    </div>
                    <div class="menuBlock">
                        <h4><a href="contact.php">Connect With Us</a></h4>
                    </div>
                </div>
                <div class="menuColumn">
                    <div class="menuBlock">
                        <h4>Join us</h4>
                        <ul>
                            <li><a href="register.php">Be a Member</a></li>
                            <li><a href="signin.php">Sign In</a></li>
                            <li><a href="volunteers.php">Volunteer With Us</a></li>
                            <li><a href="careers.php">Career</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>