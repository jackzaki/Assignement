<?php include('header.php') ?>
<?php
$query="SELECT * FROM su_pages WHERE page_language='en' and page_name='news' ";
$result=mysqli_query($db, $query);
$row=mysqli_fetch_array($result);
?>
    <section class="topSec" style="">
        <div class="bgImgCnt" style="background-image: url('<?=$mediaPath.'pages/'.$row["page_img"]?>')"></div>
    </section>

<?php
$query3="SELECT * FROM su_slider WHERE slider_language='en' and slider_status='active' and slider_position='news' ";
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
                    <li><a href="javascript:;"> <?=$row["page_title"];?></a></li>
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
$queryposts="SELECT * FROM su_posts WHERE post_language='en' and post_status='active' ORDER BY `post_ID` DESC ";
$result_posts=mysqli_query($db, $queryposts);
$sum4 = mysqli_num_rows($result_posts);
if($sum4 >0 ){  ?>
<link rel="stylesheet" type="text/css" href="css/news_style.css">
<?php while($row_post=mysqli_fetch_array($result_posts)){ ?>
                <div class="col-md-4 col-box"> 
                <!--Card-->
                <div class="card default-color-dark"> 
                 <!--Card image-->
                 <div class="view">
                  <div class="mh-image-caption mh-posts-grid-caption">Latest News</div><a href="post.php?<?=$row_post['post_name'];?>"><img src="<?=$mediaPath.'posts/'.$row_post["post_img"]?>" alt="<?=$row_post["post_title"];?>" class="card-img-top"></a></div>
                 <!--Card content-->
                 <div class="card-body text-center"> 
                  <!--Title-->
                  <h4 class="card-title white-text"><a href="post.php?<?=$row_post['post_name'];?>"><?=$row_post["post_title"];?></a></h4>
                  <!--Text-->
                 </div>
                </div>
                <!--/.Card--> 
               </div>
<? } } #sum4 ?>
   
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