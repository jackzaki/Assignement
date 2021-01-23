<?php include('header.php') ?>
<?php
$query="SELECT * FROM su_pages WHERE page_language='en' and page_name='videos' ";
$result=mysqli_query($db, $query);
$row=mysqli_fetch_array($result);
?>

    <section class="topSec" style="">
        <div class="bgImgCnt" style="background-image: url('<?=$mediaPath.'pages/'.$row["page_img"]?>')"></div>
    </section>

<?php
$query3="SELECT * FROM su_slider WHERE slider_language='en' and slider_status='active' and slider_position='videos' ";
$result3=mysqli_query($db, $query3);
$sum3 = mysqli_num_rows($result3);
if($sum3 >0 ){ ?>
    <section class="cmnSlideSec">
        <div class="container">
            <div class="cmnSlideCnt">
                <div class="sectionOneContent">
                    <div class="sectionsliderone owl-carousel owl-theme">
                    
                     <?php while($row3=mysqli_fetch_array($result3)){ ?>   
                        <div class="item">
                            <div class="sectionOneText"><?=$row3["slider_subtitle"];?></div>
                            <img src="<?=$mediaPath.'sliders/'.$row3["slider_img"];?>" alt="<?=$row3["slider_title"];?>" />
                        </div>
                     <?php } ?> 
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

    <section class="breadcrumsSec">
        <div class="container">
            <div class="breadcrumCnt">
                <ul class="d_f">
                    <li><a href="<?=$sitepath;?>en/"><i class="fas fa-home"></i></a></li>
                    <li><i class="fas fa-chevron-right"></i></li>
                    <li><a href="javascript:;">  <?=$row["page_title"];?> </a></li>
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
																$queryvideos="SELECT * FROM su_videos WHERE language='en' and video_status='active' ORDER BY `video_ID` DESC ";
																$result_videos=mysqli_query($db, $queryvideos);
																$sum_vid = mysqli_num_rows($result_videos);
																if($sum_vid >0 ){  ?>
																<link rel="stylesheet" type="text/css" href="css/news_style.css">
																<?php while($row_vid=mysqli_fetch_array($result_videos)){ ?>
                
                <?php
																$query2="SELECT * FROM su_video_category WHERE id='".$row_vid['video_category']."' and language='en' ";
																$result2=mysqli_query($db, $query2);
																$row2=mysqli_fetch_array($result2);
																?>

																<div class="col-md-4 col-box"> 
																	<div class="card2 default-color-dark"> 
																		<div class="view">
                  <a href="<?=$sitepath.'en/video_category.php?'.$row2['cat_name2'];?>"><div class="mh-image-caption mh-posts-grid-caption"><?=$row2['cat_name'];?></div></a>
																		<?=$row_vid['video_code'];?>
																		</div>
																	</div>
																</div>
																<? } } ?>
                
                
            </div>
        </div>
    </section>

<?php
$query4="SELECT * FROM su_embedcodes WHERE language='en' and embed_status='active' and embed_page='".$row["page_ID"]."' and embed_position='after_content' ";
$result4=mysqli_query($db, $query4);
$sum4 = mysqli_num_rows($result4);
if($sum4 >0 ){ ?>    
    <section class="videoSec">
        <div class="videoCont">
            <?php while($row4=mysqli_fetch_array($result4)){ ?> <?=$row4['embed_code'];?> <?php } ?>
        </div>
    </section>
<?php } ?>

<?php include('footer.php') ?>