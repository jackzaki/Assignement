<?php include('header.php') ?>
<?php
$query="SELECT * FROM su_pages WHERE page_language='en' and page_name='tracks' ";
$result=mysqli_query($db, $query);
$row=mysqli_fetch_array($result);

$query2="SELECT * FROM su_page_category WHERE id='".$row['page_category']."' and language='en' ";
$result2=mysqli_query($db, $query2);
$row2=mysqli_fetch_array($result2);
?>

    <section class="topSec" style="">
        <div class="bgImgCnt" style="background-image: url('<?=$mediaPath.'pages/'.$row["page_img"]?>')"></div>
    </section>

<?php
$query3="SELECT * FROM su_slider WHERE slider_language='en' and slider_status='active' and slider_position='tracks' ";
$result3=mysqli_query($db, $query3);
$sum3 = mysqli_num_rows($result3);
if($sum3 >0 ){ ?>
    <section class="cmnSlideSec">
        <div class="container">
            <div class="cmnSlideCnt">
                <div class="sectionOneContent">
                    <div class="sectionTwoSlider owl-carousel owl-theme">
                    
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
            </div>
        </div>
    </section>

<?php
$query4="SELECT * FROM su_tracks WHERE language='en' and track_status='active' ";
$result4=mysqli_query($db, $query4);
$sum4 = mysqli_num_rows($result4);
if($sum4 >0 ){  
?>    
    <section class="infoGraphicSec">
        <div class="container">
            <div class="infoGraphicCnt">
                <ul class="_info d_f">
                   <?php while($row4=mysqli_fetch_array($result4)){ 
																			if($row4['track_ID']=='7'){ $track_id1 = $row4['track_ID'];$title1 = $row4['track_title'];$track_content1 = $row4['track_content'];	$track_video1 = $row4['track_video']; }
																			if($row4['track_ID']=='8'){ $track_id2 = $row4['track_ID'];$title2 = $row4['track_title'];$track_content2 = $row4['track_content'];	$track_video2 = $row4['track_video']; }
																			if($row4['track_ID']=='9'){ $track_id3 = $row4['track_ID'];$title3 = $row4['track_title'];$track_content3 = $row4['track_content'];	$track_video3 = $row4['track_video']; }
																			if($row4['track_ID']=='10'){ $track_id4 = $row4['track_ID'];$title4 = $row4['track_title'];$track_content4 = $row4['track_content'];	$track_video4 = $row4['track_video']; }
																			if($row4['track_ID']=='11'){ $track_id5 = $row4['track_ID'];$title5 = $row4['track_title'];$track_content5 = $row4['track_content'];	$track_video5 = $row4['track_video']; }
																			if($row4['track_ID']=='12'){ $track_id6 = $row4['track_ID'];$title6 = $row4['track_title'];$track_content6 = $row4['track_content'];	$track_video6 = $row4['track_video']; }
																			if($row4['track_ID']=='13'){ $track_id7 = $row4['track_ID'];$title7 = $row4['track_title'];$track_content7 = $row4['track_content'];	$track_video7 = $row4['track_video']; }
																			if($row4['track_ID']=='14'){ $track_id8 = $row4['track_ID'];$title8 = $row4['track_title'];$track_content8 = $row4['track_content'];	$track_video8 = $row4['track_video']; }
																			?>   
                    <li tab-id="tab_<?=$row4['track_ID'];?>">
                        <span class="_icon">
                            <img src="<?=$mediaPath.'tracks/'.$row4['track_icon'];?>" alt="<?=$row4['track_title'];?>">
                        </span>
                        <?=$row4['track_title'];?>
                    </li>
																			<?php }  ?>
                </ul>
            </div>
        </div>
    </section>  

    <section class="commonSldrSec">
        <div class="container">
            <div class="commonSldrCnt">
                <div class="commonSlider infoSlider owl-carousel owl-theme">
                    <?php /*?><div class="item">
                        <div class="sliderIcon">
                            <img src="<?=$mediaPath.'tracks/'.$row4['track_icon'];?>" alt="">
                        </div>
                        <img src="<?=$mediaPath.'tracks/'.$row4['track_img'];?>" />
                    </div><?php */?>
                </div>    
            </div>
        </div>
    </section>
            
    <section class="tabSec">
        <section class="tabData ative" tab-data="tab_<?=$track_id1;?>">
            <section class="cntntSec">
                <div class="container">
                    <div class="cntntCnt">
                        <h1>  <?=$title1;?>   </h1>
                        <?=$track_content1;?>
                    </div>
                </div>
            </section>
            <?php if($track_video1 != ''){ ?>
            <section class="videoSec">
                <div class="container">
                    <div class="videoCnt">
                    <?=$track_video1;?>
                    </div>
                </div>
            </section><? }?>
        </section>
        <section class="tabData " tab-data="tab_<?=$track_id2;?>">
            <section class="cntntSec">
                <div class="container">
                    <div class="cntntCnt">
                        <h1>  <?=$title2;?>   </h1>
                        <?=$track_content2;?>
                    </div>
                </div>
            </section>
            <?php if($track_video2 != ''){ ?>
            <section class="videoSec">
                <div class="container">
                    <div class="videoCnt">
                    <?=$track_video2;?>
                    </div>
                </div>
            </section><? }?>
        </section>
        <section class="tabData " tab-data="tab_<?=$track_id3;?>">
            <section class="cntntSec">
                <div class="container">
                    <div class="cntntCnt">
                        <h1>  <?=$title3;?>   </h1>
                        <?=$track_content3;?>
                    </div>
                </div>
            </section>
            <?php if($track_video3 != ''){ ?>
            <section class="videoSec">
                <div class="container">
                    <div class="videoCnt">
                    <?=$track_video3;?>
                    </div>
                </div>
            </section><? }?>
        </section>
        <section class="tabData " tab-data="tab_<?=$track_id4;?>">
            <section class="cntntSec">
                <div class="container">
                    <div class="cntntCnt">
                        <h1>  <?=$title4;?>   </h1>
                        <?=$track_content4;?>
                    </div>
                </div>
            </section>
            <?php if($track_video4 != ''){ ?>
            <section class="videoSec">
                <div class="container">
                    <div class="videoCnt">
                    <?=$track_video4;?>
                    </div>
                </div>
            </section><? }?>
        </section>
        <section class="tabData " tab-data="tab_<?=$track_id5;?>">
            <section class="cntntSec">
                <div class="container">
                    <div class="cntntCnt">
                        <h1>  <?=$title5;?>   </h1>
                        <?=$track_content5;?>
                    </div>
                </div>
            </section>
            <?php if($track_video5 != ''){ ?>
            <section class="videoSec">
                <div class="container">
                    <div class="videoCnt">
                    <?=$track_video5;?>
                    </div>
                </div>
            </section><? }?>
        </section>
        <section class="tabData " tab-data="tab_<?=$track_id6;?>">
            <section class="cntntSec">
                <div class="container">
                    <div class="cntntCnt">
                        <h1>  <?=$title6;?>   </h1>
                        <?=$track_content6;?>
                    </div>
                </div>
            </section>
            <?php if($track_video6 != ''){ ?>
            <section class="videoSec">
                <div class="container">
                    <div class="videoCnt">
                    <?=$track_video6;?>
                    </div>
                </div>
            </section><? }?>
        </section>
        <section class="tabData " tab-data="tab_<?=$track_id7;?>">
            <section class="cntntSec">
                <div class="container">
                    <div class="cntntCnt">
                        <h1>  <?=$title7;?>   </h1>
                        <?=$track_content7;?>
                    </div>
                </div>
            </section>
            <?php if($track_video7 != ''){ ?>
            <section class="videoSec">
                <div class="container">
                    <div class="videoCnt">
                    <?=$track_video7;?>
                    </div>
                </div>
            </section><? }?>
        </section>
        <section class="tabData " tab-data="tab_<?=$track_id8;?>">
            <section class="cntntSec">
                <div class="container">
                    <div class="cntntCnt">
                        <h1>  <?=$title8;?>   </h1>
                        <?=$track_content8;?>
                    </div>
                </div>
            </section>
            <?php if($track_video8 != ''){ ?>
            <section class="videoSec">
                <div class="container">
                    <div class="videoCnt">
                    <?=$track_video8;?>
                    </div>
                </div>
            </section><? }?>
        </section>
    </section>
    
<?php } ?>      
<?php include('footer.php') ?>