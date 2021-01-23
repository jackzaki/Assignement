<?php include('header.php') ?>
<?php
$query="SELECT * FROM su_pages WHERE page_language='en' and page_name='centers' ";
$result=mysqli_query($db, $query);
$row=mysqli_fetch_array($result);

$query2="SELECT * FROM su_page_category WHERE id='".$rowabout['page_category']."' and language='en' ";
$result2=mysqli_query($db, $query2);
$row2=mysqli_fetch_array($result2);

$query4="SELECT * FROM su_timeline WHERE language='en' ";
$result4=mysqli_query($db, $query4);
?>

    <section class="topSec" style="">
        <div class="bgImgCnt" style="background-image: url('<?=$mediaPath.'pages/'.$row["page_img"]?>')"></div>
    </section>
    
<?php
$query3="SELECT * FROM su_slider WHERE slider_language='en' and slider_status='active' and slider_position='centers' ";
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
            </div>
        </div>
    </section>
    <section class="cnterTabSec">
        <section class="cntrTabBtnCnt">
            <div class="container">
                <ul class="cntrTabbtn d_f">
                    
                    <?php while($row4=mysqli_fetch_array($result4)) { ?>
                    <li>
                        <p class="_year"><?=$row4['timeline_year'];?></p>
                        <ul class="sbPoints">
                          <?php 
																										$query5="SELECT * FROM su_centers WHERE center_timeline='".$row4['timeline_ID']."' and language='en' ORDER BY `center_ID` ASC ";
																										$result5=mysqli_query($db, $query5);
																										while($row5=mysqli_fetch_array($result5)) { ?>
                          <? if($row5['center_ID']=='34'){ $track_id1 = $row5['center_ID']; $center_headline1 = $row5['center_headline']; $center_img1 = $row5['center_img']; $center_img_caption1 = $row5['center_img_caption'];	$center_title1 = $row5['center_title']; $center_content1 = $row5['center_content']; $center_map1 = $row5['center_map']; }
																													if($row5['center_ID']=='35'){ $track_id2 = $row5['center_ID']; $center_headline2 = $row5['center_headline']; $center_img2 = $row5['center_img']; $center_img_caption2 = $row5['center_img_caption'];	$center_title2 = $row5['center_title']; $center_content2 = $row5['center_content']; $center_map2 = $row5['center_map']; }
																													if($row5['center_ID']=='36'){ $track_id3 = $row5['center_ID']; $center_headline3 = $row5['center_headline']; $center_img3  = $row5['center_img']; $center_img_caption3 = $row5['center_img_caption'];	$center_title3 = $row5['center_title']; $center_content3 = $row5['center_content']; $center_map3 = $row5['center_map']; }
																													if($row5['center_ID']=='37'){ $track_id4 = $row5['center_ID']; $center_headline4 = $row5['center_headline']; $center_img4 = $row5['center_img']; $center_img_caption4 = $row5['center_img_caption'];	$center_title4 = $row5['center_title']; $center_content4 = $row5['center_content']; $center_map4 = $row5['center_map']; }
																													if($row5['center_ID']=='38'){ $track_id5 = $row5['center_ID']; $center_headline5 = $row5['center_headline']; $center_img5 = $row5['center_img']; $center_img_caption5 = $row5['center_img_caption'];	$center_title5 = $row5['center_title']; $center_content5 = $row5['center_content']; $center_map5 = $row5['center_map']; }
																													if($row5['center_ID']=='39'){ $track_id6 = $row5['center_ID']; $center_headline6 = $row5['center_headline']; $center_img6 = $row5['center_img']; $center_img_caption6 = $row5['center_img_caption'];	$center_title6 = $row5['center_title']; $center_content6 = $row5['center_content']; $center_map6 = $row5['center_map']; }
																													if($row5['center_ID']=='40'){ $track_id7 = $row5['center_ID']; $center_headline7 = $row5['center_headline']; $center_img7 = $row5['center_img']; $center_img_caption7 = $row5['center_img_caption'];	$center_title7 = $row5['center_title']; $center_content7 = $row5['center_content']; $center_map7 = $row5['center_map']; }
																													if($row5['center_ID']=='41'){ $track_id8 = $row5['center_ID']; $center_headline8 = $row5['center_headline']; $center_img8  = $row5['center_img']; $center_img_caption8 = $row5['center_img_caption'];	$center_title8 = $row5['center_title']; $center_content8 = $row5['center_content']; $center_map8 = $row5['center_map']; }
																													if($row5['center_ID']=='42'){ $track_id9 = $row5['center_ID']; $center_headline9 = $row5['center_headline']; $center_img9  = $row5['center_img']; $center_img_caption9 = $row5['center_img_caption'];	$center_title9 = $row5['center_title']; $center_content9 = $row5['center_content']; $center_map9 = $row5['center_map']; }
																													if($row5['center_ID']=='43'){ $track_id10 = $row5['center_ID']; $center_headline10 = $row5['center_headline']; $center_img10  = $row5['center_img']; $center_img_caption10 = $row5['center_img_caption'];	$center_title10 = $row5['center_title']; $center_content10 = $row5['center_content']; $center_map10 = $row5['center_map']; } ?>
                            <li tab-id="tab_<?=$row5['center_ID'];?>" style="background-color: #<?=$row5['center_title_bgcolor'];?>;"><p><?=$row5['center_title'];?></p></li>
                           <?php } ?>  
                        </ul>
                    </li>
                    <?php } ?>
                    
                </ul>
            </div>
        </section>
        <section class="cntrTabData active" tab-data="tab_<?=$track_id1;?>">
            <section class="hdngSec">
                <div class="container">
                    <h1> <?=$center_headline1;?> </h1>
                    <br>
                </div>
            </section>
            <section class="commonSldrSec">
                <div class="container">
                    <div class="commonSldrCnt">
                        <div class="commonSlider ">
                            <div class="item">
                                <div class="sectionOneText"><?=$center_img_caption1;?></div>
                                <img src="<?=$mediaPath.'centers/'.$center_img1;?>" />
                            </div>
                        </div>    
                    </div>
                </div>
            </section>
            <section class="cntntSec">
                <div class="container">
                    <div class="cntntCnt">
                        <h1> <?=$center_title1;?>  </h1>
                        <?=$center_content1;?>
                    </div>
                    
                    <?php if($center_map1 != ''){ ?>
                    <div class="centerMap">
                        <?=$center_map1;?>
                    </div>
                     <? } ?>
                </div>
            </section>
        </section>
        <section class="cntrTabData" tab-data="tab_<?=$track_id2;?>">
            <section class="hdngSec">
                <div class="container">
                    <h1> <?=$center_headline2;?> </h1>
                    <br>
                </div>
            </section>
            <section class="commonSldrSec">
                <div class="container">
                    <div class="commonSldrCnt">
                        <div class="commonSlider ">
                            <div class="item">
                                <div class="sectionOneText"><?=$center_img_caption2;?></div>
                                <img src="<?=$mediaPath.'centers/'.$center_img2;?>" />
                            </div>
                        </div>    
                    </div>
                </div>
            </section>
            <section class="cntntSec">
                <div class="container">
                    <div class="cntntCnt">
                        <h1> <?=$center_title2;?>  </h1>
                        <?=$center_content2;?>
                    </div>
                    
                    <?php if($center_map2 != ''){ ?>
                    <div class="centerMap">
                        <?=$center_map2;?>
                    </div><? } ?>
                </div>
            </section>
        </section>
        <section class="cntrTabData" tab-data="tab_<?=$track_id3;?>">
            <section class="hdngSec">
                <div class="container">
                    <h1> <?=$center_headline3;?>  </h1>
                    <br>
                </div>
            </section>
            <section class="commonSldrSec">
                <div class="container">
                    <div class="commonSldrCnt">
                        <div class="commonSlider ">
                            <div class="item">
                                <div class="sectionOneText"><?=$center_img_caption3;?></div>
                                <img src="<?=$mediaPath.'centers/'.$center_img3;?>" />
                            </div>
                        </div>    
                    </div>
                </div>
            </section>
            <section class="cntntSec">
                <div class="container">
                    <div class="cntntCnt">
                        <h1> <?=$center_title3;?>  </h1>
                        <?=$center_content3;?>
                    </div>
                    
                    <?php if($center_map3 != ''){ ?>
                    <div class="centerMap">
                        <?=$center_map3;?>
                    </div>
																				<? } ?>
                </div>
            </section>
        </section>
        <section class="cntrTabData" tab-data="tab_<?=$track_id4;?>">
            <section class="hdngSec">
                <div class="container">
                    <h1> <?=$center_headline4;?> </h1>
                    <br>
                </div>
            </section>
            <section class="commonSldrSec">
                <div class="container">
                    <div class="commonSldrCnt">
                        <div class="commonSlider ">
                            <div class="item">
                                <div class="sectionOneText"><?=$center_img_caption4;?></div>
                                <img src="<?=$mediaPath.'centers/'.$center_img4;?>" />
                            </div>
                        </div>    
                    </div>
                </div>
            </section>
            <section class="cntntSec">
                <div class="container">
                    <div class="cntntCnt">
                        <h1> <?=$center_title4;?>  </h1>
                        <?=$center_content4;?>
                    </div>
                    
                    <?php if($center_map4 != ''){ ?>
                    <div class="centerMap">
                        <?=$center_map4;?>
                    </div>
																				<? } ?>
                </div>
            </section>
        </section>
        <section class="cntrTabData" tab-data="tab_<?=$track_id5;?>">
            <section class="hdngSec">
                <div class="container">
                    <h1> <?=$center_headline5;?> </h1>
                    <br>
                </div>
            </section>
            <section class="commonSldrSec">
                <div class="container">
                    <div class="commonSldrCnt">
                        <div class="commonSlider ">
                            <div class="item">
                                <div class="sectionOneText"><?=$center_img_caption5;?></div>
                                <img src="<?=$mediaPath.'centers/'.$center_img5;?>" />
                            </div>
                        </div>    
                    </div>
                </div>
            </section>
            <section class="cntntSec">
                <div class="container">
                    <div class="cntntCnt">
                        <h1> <?=$center_title5;?>  </h1>
                        <?=$center_content5;?>
                    </div>
                    
                    <?php if($center_map5 != ''){ ?>
                    <div class="centerMap">
                        <?=$center_map5;?>
                    </div>
																				<? } ?>
                </div>
            </section>
        </section>
        <section class="cntrTabData" tab-data="tab_<?=$track_id6;?>">
            <section class="hdngSec">
                <div class="container">
                    <h1> <?=$center_headline6;?> </h1>
                    <br>
                </div>
            </section>
            <section class="commonSldrSec">
                <div class="container">
                    <div class="commonSldrCnt">
                        <div class="commonSlider ">
                            <div class="item">
                                <div class="sectionOneText"><?=$center_img_caption6;?></div>
                                <img src="<?=$mediaPath.'centers/'.$center_img6;?>" />
                            </div>
                        </div>    
                    </div>
                </div>
            </section>
            <section class="cntntSec">
                <div class="container">
                    <div class="cntntCnt">
                        <h1> <?=$center_title6;?>  </h1>
                        <?=$center_content6;?>
                    </div>
                    
                    <?php if($center_map6 != ''){ ?>
                    <div class="centerMap">
                        <?=$center_map6;?>
                    </div>
																				<? } ?>
                </div>
            </section>
        </section>
        <section class="cntrTabData" tab-data="tab_<?=$track_id7;?>">
            <section class="hdngSec">
                <div class="container">
                    <h1> <?=$center_headline7;?> </h1>
                    <br>
                </div>
            </section>
            <section class="commonSldrSec">
                <div class="container">
                    <div class="commonSldrCnt">
                        <div class="commonSlider ">
                            <div class="item">
                                <div class="sectionOneText"><?=$center_img_caption7;?></div>
                                <img src="<?=$mediaPath.'centers/'.$center_img7;?>" />
                            </div>
                        </div>    
                    </div>
                </div>
            </section>
            <section class="cntntSec">
                <div class="container">
                    <div class="cntntCnt">
                        <h1> <?=$center_title7;?>  </h1>
                        <?=$center_content7;?>
                    </div>
                    
                    <?php if($center_map7 != ''){ ?>
                    <div class="centerMap">
                        <?=$center_map7;?>
                    </div>
																				<? } ?>
                </div>
            </section>
        </section>
        <section class="cntrTabData" tab-data="tab_<?=$track_id8;?>">
            <section class="hdngSec">
                <div class="container">
                    <h1> <?=$center_headline8;?> </h1>
                    <br>
                </div>
            </section>
            <section class="commonSldrSec">
                <div class="container">
                    <div class="commonSldrCnt">
                        <div class="commonSlider ">
                            <div class="item">
                                <div class="sectionOneText"><?=$center_img_caption8;?></div>
                                <img src="<?=$mediaPath.'centers/'.$center_img8;?>" />
                            </div>
                        </div>    
                    </div>
                </div>
            </section>
            <section class="cntntSec">
                <div class="container">
                    <div class="cntntCnt">
                        <h1> <?=$center_title8;?>  </h1>
                        <?=$center_content8;?>
                    </div>
                    
                    <?php if($center_map8 != ''){ ?>
                    <div class="centerMap">
                        <?=$center_map8;?>
                    </div>
																				<? } ?>
                </div>
            </section>
        </section>
        <section class="cntrTabData" tab-data="tab_<?=$track_id9;?>">
            <section class="hdngSec">
                <div class="container">
                    <h1> <?=$center_headline9;?> </h1>
                    <br>
                </div>
            </section>
            <section class="commonSldrSec">
                <div class="container">
                    <div class="commonSldrCnt">
                        <div class="commonSlider ">
                            <div class="item">
                                <div class="sectionOneText"><?=$center_img_caption9;?></div>
                                <img src="<?=$mediaPath.'centers/'.$center_img9;?>" />
                            </div>
                        </div>    
                    </div>
                </div>
            </section>
            <section class="cntntSec">
                <div class="container">
                    <div class="cntntCnt">
                        <h1> <?=$center_title9;?>  </h1>
                        <?=$center_content9;?>
                    </div>
                    
                    <?php if($center_map9 != ''){ ?>
                    <div class="centerMap">
                        <?=$center_map9;?>
                    </div>
																				<? } ?>
                </div>
            </section>
        </section>
        <section class="cntrTabData" tab-data="tab_<?=$track_id10;?>">
            <section class="hdngSec">
                <div class="container">
                    <h1> <?=$center_headline10;?> </h1>
                    <br>
                </div>
            </section>
            <section class="commonSldrSec">
                <div class="container">
                    <div class="commonSldrCnt">
                        <div class="commonSlider ">
                            <div class="item">
                                <div class="sectionOneText"><?=$center_img_caption10;?></div>
                                <img src="<?=$mediaPath.'centers/'.$center_img10;?>" />
                            </div>
                        </div>    
                    </div>
                </div>
            </section>
            <section class="cntntSec">
                <div class="container">
                    <div class="cntntCnt">
                        <h1> <?=$center_title10;?>  </h1>
                        <?=$center_content10;?>
                    </div>
                    
                    <?php if($center_map10 != ''){ ?>
                    <div class="centerMap">
                        <?=$center_map10;?>
                    </div>
																				<? } ?>
                </div>
            </section>
        </section>
    </section>
<?php include('footer.php') ?>