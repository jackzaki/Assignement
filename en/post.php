<?php include('header.php') ?>
<?php
function curPageURL() {

    $url = $_SERVER['REQUEST_URI'];
    $url = explode('?', $url);
    $lastPart = array_pop($url);
    return $lastPart;
}
$link_post = curPageURL();
?>
<?php
$query="SELECT * FROM su_posts WHERE post_language='en' and post_name='$link_post' ";
$result=mysqli_query($db, $query);
$row=mysqli_fetch_array($result);
?>

    <section class="topSec" style="">
        <div class="bgImgCnt" style="background-image: url('<?=$mediaPath.'posts/'.$row["post_img"]?>')"></div>
    </section>

    <section class="cmnSlideSec">
        <div class="container">
            <div class="cmnSlideCnt">
                <div class="sectionOneContent">
                    <div class="sectionsliderone owl-carousel owl-theme">
                    
                        <div class="item">
                            <div class="sectionOneText"><?=$row["post_title"];?></div>
                            <img src="<?=$mediaPath.'posts/'.$row["post_img"];?>" alt="<?=$row["post_title"];?>" />
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <section class="cntntSec">
        <div class="container">
            <div class="cntntCnt justify">
                <h1><?=$row["post_title"];?></h1>
                <?=stripslashes($row["post_detail"]);?>
            </div>
        </div>
    </section>


<?php include('footer.php') ?>