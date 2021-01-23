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
$query="SELECT * FROM su_pages WHERE page_language='en' and page_name='videos' ";
$result=mysqli_query($db, $query);
$row=mysqli_fetch_array($result);
?>
<?php
$query2="SELECT * FROM su_video_category WHERE cat_name2='".$link_post."' and language='en' ";
$result2=mysqli_query($db, $query2);
$row2=mysqli_fetch_array($result2);
?>                

    <section class="topSec" style="">
        <div class="bgImgCnt" style="background-image: url('<?=$mediaPath.'pages/'.$row["page_img"]?>')"></div>
    </section>

    <section class="breadcrumsSec">
        <div class="container">
            <div class="breadcrumCnt">
                <ul class="d_f">
                    <li><a href="<?=$sitepath;?>/en"><i class="fas fa-home"></i></a></li>
                    <li><i class="fas fa-chevron-left"></i></li>
                    <li><a href="<?=$sitepath;?>en/videos.php"><?=$row["page_title"];?></a></li>
                </ul>
            </div>
        </div>
    </section>
    <section class="cntntSec">
        <div class="container">
            <div class="cntntCnt justify">
                <h1><?=$row2['cat_name'];?></h1>

<?php
$queryvideos="SELECT * FROM su_videos WHERE language='en' and video_status='active' AND video_category='".$row2['id']."' ORDER BY `video_ID` DESC ";
$result_videos=mysqli_query($db, $queryvideos);
$sum_vid = mysqli_num_rows($result_videos);
if($sum_vid >0 ){  ?>
<link rel="stylesheet" type="text/css" href="css/news_style.css">
<?php while($row_vid=mysqli_fetch_array($result_videos)){ ?>

              <div class="col-md-4 col-box"> 
                <!--Card-->
                <div class="card2 default-color-dark"> 
                 <!--Card image-->
                 <div class="view">
                 <?=$row_vid['video_code'];?>
                 </div>
                 <!--Card content-->
                </div>
                <!--/.Card--> 
               </div>

<? } } ?>
            </div>
        </div>
    </section>


<?php include('footer.php') ?>