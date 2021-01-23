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
$query2="SELECT * FROM su_gallery_category WHERE cat_name2='".$link_post."' and language='en' ";
$result2=mysqli_query($db, $query2);
$row2=mysqli_fetch_array($result2);
?>
<?php
$query="SELECT * FROM su_pages WHERE page_language='en' and page_name='gallery' ";
$result=mysqli_query($db, $query);
$row=mysqli_fetch_array($result);
?>

    <section class="topSec" style="">
        <div class="bgImgCnt" style="background-image: url('<?=$mediaPath.'pages/'.$row["page_img"]?>')"></div>
    </section>

    <section class="breadcrumsSec">
        <div class="container">
            <div class="breadcrumCnt">
                <ul class="d_f">
                    <li><a href="<?=$sitepath;?>en/"><i class="fas fa-home"></i></a></li>
                    <li><i class="fas fa-chevron-right"></i></li>
                    <li><a href="<?=$sitepath;?>en/gallery.php"> <?=$row["page_title"];?></a></li>
                </ul>
            </div>
        </div>
    </section>
    <section class="cntntSec">
        <div class="container">
            <div class="cntntCnt justify">
                <h1><?=$row["page_title"];?></h1>
                <?=stripslashes($row["page_detail"]);?>
                
                
                 <?php
																$queryvideos="SELECT * FROM su_gallery WHERE language='en' and gallery_status='active' AND gallery_category='".$row2['id']."' ORDER BY `gallery_ID` DESC ";
																$result_videos=mysqli_query($db, $queryvideos);
																$sum_vid = mysqli_num_rows($result_videos);
																if($sum_vid >0 ){  ?>
																<link rel="stylesheet" type="text/css" href="css/news_style.css">
                <link rel="stylesheet" href="viewbox/viewbox.css">
																<?php while($row_vid=mysqli_fetch_array($result_videos)){ ?>

																<div class="col-md-4 col-box"> 
                <div class="card default-color-dark"> 
                 <div class="view">
                 <div class="mh-image-caption mh-posts-grid-caption"><?=$row2['cat_name'];?></div>
                   <a href="<?=$mediaPath.'gallery/'.$row_vid["gallery_img"]?>" class="image-link"><img src="<?=$mediaPath.'gallery/'.$row_vid["gallery_img"]?>" alt="<?=$row_vid["gallery_title"];?>" class="card-img-top"></a>
                 </div>
                 <div class="card-body text-center" style="padding:0 10px;"> 
                  <h4 class="card-title white-text" style="margin:0;padding-bottom:10px;"><?=$row_vid["gallery_title"];?></h4>
                 </div>
                </div>
               </div>
                
																<? } } ?>
                
                
                
            </div>
        </div>
    </section>


<?php include('footer.php') ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="viewbox/jquery.viewbox.min.js"></script>
<script>
$(function(){
	$('.image-link').viewbox();
});
</script>
