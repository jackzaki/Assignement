<?php include('header.php') ?>
<?php
$about="SELECT * FROM su_pages WHERE page_language='en' and page_name='about' ";
$resabout=mysqli_query($db, $about);
$rowabout=mysqli_fetch_array($resabout);

$aboutcat="SELECT * FROM su_page_category WHERE id='".$rowabout['page_category']."' and language='en' ";
$rescat=mysqli_query($db, $aboutcat);
$rowcat=mysqli_fetch_array($rescat);
?>
    
    <section class="topSec" style="">
        <div class="bgImgCnt" style="background-image: url('<?=$mediaPath.'pages/'.$rowabout["page_img"]?>')"></div>
    </section>

<?php
$query="SELECT * FROM su_slider WHERE slider_language='en' and slider_status='active' and slider_position='about' ";
$result=mysqli_query($db, $query);
$sum = mysqli_num_rows($result);
if($sum >0 ){ ?>
    <section class="cmnSlideSec">
        <div class="container">
            <div class="cmnSlideCnt">
                <div class="sectionOneContent">
                    <div class="sectionTwoSlider owl-carousel owl-theme">
                       <?php while($row=mysqli_fetch_array($result)){ ?>   
                        <div class="item">
                            <div class="sectionOneText"><?=$row["slider_subtitle"];?></div>
                            <img src="<?=$mediaPath.'sliders/'.$row["slider_img"];?>" alt="<?=$row["slider_title"];?>" />
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
                    <li><a href="javascript:;"> <?=$rowabout["page_title"];?> </a></li>
                </ul>
            </div>
        </div>
    </section>

<?php
$query1="SELECT * FROM su_embedcodes WHERE language='en' and embed_status='active' and embed_page='".$rowabout["page_ID"]."' and embed_position='before_content' ";
$result1=mysqli_query($db, $query1);
$sum1 = mysqli_num_rows($result1);
if($sum1 >0 ){ ?>    
    <section class="videoSec">
        <div class="videoCont">
            <?php while($row1=mysqli_fetch_array($result1)){ ?> <?=$row1['embed_code'];?> <?php } ?>
        </div>
    </section>
<?php } ?>


    <section class="cntntSec">
        <div class="container">
            <div class="cntntCnt">
                <h1><?=$rowabout["page_title"];?></h1>
                <?=stripslashes($rowabout["page_detail"]);?>
            </div>
        </div>
    </section>
    
<?php
$query2="SELECT * FROM su_embedcodes WHERE language='en' and embed_status='active' and embed_page='".$rowabout["page_ID"]."' and embed_position='after_content' ";
$result2=mysqli_query($db, $query2);
$sum2 = mysqli_num_rows($result2);
if($sum2 >0 ){ ?>    
    <section class="videoSec">
        <div class="videoCont">
            <?php while($row2=mysqli_fetch_array($result2)){ ?> <?=$row2['embed_code'];?> <?php } ?>
        </div>
    </section>
<?php } ?>
    
<?php include('footer.php') ?>