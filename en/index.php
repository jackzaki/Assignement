<?php include('header.php') ?>

<?php
$query="SELECT * FROM su_slider WHERE slider_language='en' and slider_status='active' and slider_position='home_main' ";
$result=mysqli_query($db, $query);
$sum = mysqli_num_rows($result);
if($sum >0 ){
?>
    <!--Slider-->
    <div class="mainslider owl-carousel owl-theme">
    <?php
				while($row=mysqli_fetch_array($result)){
				?>
        <div class="item">
            <div class="slider-content">
                <h3><?=$row["slider_title"];?></h3>
                <h5><?=$row["slider_subtitle"];?></h5>
            </div>
            <img src="<?=$mediaPath.'sliders/'.$row["slider_img"];?>" />
            <div class="social-icons">
                <ul>
                 <?php if(!empty($website_instagram)){?><li><a href=""><i class="icon-instagram"></i></a></li><? }?>
                 <?php if(!empty($website_facebook)){?><li><a href=""><i class="icon-facebook-1"></i></a></li><? }?>
                 <?php if(!empty($website_twitter)){?><li><a href=""><i class="icon-twitter"></i></a></li><? }?>
                 <?php if(!empty($website_linkedin)){?><li><a href=""><i class="icon-linkedin"></i></a></li><? }?>
                  <?php if(!empty($website_youtube)){?><li><a href=""><i class="icon-youtube-play"></i></a></li><? }?>
                </ul>
            </div>
        </div>
       <? } #while?> 
        
    </div>
<? } #Slider End?>     
    <!--Slider End-->


    <!--Welcome Text-->
    <div class="aboutUs">
    <?php
				$home="SELECT * FROM su_pages WHERE page_language='en' and page_name='index' ";
				$reshome=mysqli_query($db, $home);
				$rowhome=mysqli_fetch_array($reshome);
				$page_title=stripslashes($rowhome["page_title"]);
				$page_detail=stripslashes($rowhome["page_detail"]);
				$page_btnlink = $rowhome["page_btnlink"];
				?>

        <h2><?=$page_title;?></h2>
        <?=$page_detail;?>
        <a href="about.php" class="themeBtn">Read More</a>
    </div>
    <!--Welcome Text End-->

    <!--Section 1-->
<?php
$query1="SELECT * FROM su_slider WHERE slider_language='en' and slider_status='active' and slider_position='program_workshop' ORDER BY `slider_slide_no` ASC ";
$result1=mysqli_query($db, $query1);
$sum1 = mysqli_num_rows($result1);
if($sum1 >0 ){ ?>
    <div class="sectionOne">
     <div class="row"><div class="container"><div class="col-md-2"></div><div class="col-md-8">
        <h2>Participate in Programs and Workshops</h2>
        <div class="sectionOneContent">
            <div class="sectionTwoSlider owl-carousel owl-theme">
												<?php while($row1=mysqli_fetch_array($result1)){ ?>
                <div class="item">
                    <div class="sectionOneText"><?=$row1["slider_subtitle"];?></div>
                    <img src="<?=$mediaPath.'sliders/'.$row1["slider_img"];?>" />
                </div>
												<?php } ?>                
            </div>
        </div>
        </div><div class="col-md-2"></div></div></div>
    </div>
<?php } ?>   
    <!--Section 1 Ends-->

    <!--Section 2 starts-->
<?php
$query2="SELECT * FROM su_posts WHERE post_language='en' and post_status='active' and post_featured='yes' ORDER BY `post_ID` DESC ";
$result2=mysqli_query($db, $query2);
$sum2 = mysqli_num_rows($result2);
if($sum2 >0 ){  ?>
    <div class="sectionTwo gray-bg">
        <h2>Latest News</h2>
        <div class="sectionTwoContainer">
            <div class="sectionTwoSlider owl-carousel owl-theme">
												
												<?php while($row2=mysqli_fetch_array($result2)){ ?>
            <?php
																		// strip tags to avoid breaking any html
																		$string = strip_tags($row2['post_detail']);
																		if (strlen($string) > 850) {
																		
																						// truncate string
																						$stringCut = substr($string, 0, 850);
																						$endPoint = strrpos($stringCut, ' ');
																		
																						//if the string doesn't contain any space then it will cut without word basis.
																						$string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
																						$string .= '<br><br><a href="post.php?'.$row2['post_name'].'" class="themeBtn">Read More</a>';
																		}
																		
																		?>


                <div class="item">
                <div><a href="post.php?<?=$row2['post_name'];?>"><img src="<?=$mediaPath.'posts/'.$row2["post_img"];?>" /></a></div>
                    <div class="newsContent">
                        <div class="date">
                            <?=$row2['post_date'];?>
                            <i class="icon-calendar"></i>
                        </div>
                        <h3><a href="post.php?<?=$row2['post_name'];?>"><?=$row2['post_title'];?></a></h3>
                        <? echo $string;?>
                        
                    </div>
                    
                </div>
												<?php } ?> 
                           
            </div>
        </div>
    </div>
<?php } ?> 
    <!--Section 2 Ends-->

    <!--Section 3 Starts-->
<?php
$query3="SELECT * FROM su_slider WHERE slider_language='en' and slider_status='active' and slider_position='himma_gifts' ORDER BY `slider_slide_no` ASC ";
$result3=mysqli_query($db, $query3);
$sum3 = mysqli_num_rows($result3);
if($sum3 >0 ){
?>
    <div class="sectionThree">
     <div class="row"><div class="container"><div class="col-md-2"></div><div class="col-md-8">
        <h2>Himma New Gifts</h2>
        <div class="sectionThreeSliderContainer">
            <div class="sectionTwoSlider owl-carousel owl-theme">
            
												<?php while($row3=mysqli_fetch_array($result3)){ ?>               
                <div class="item">
                    <img src="<?=$mediaPath.'sliders/'.$row3["slider_img"];?>" />
                    <div class="sectionThreeText"><?=$row3["slider_subtitle"];?></div>
                </div>
												<?php } ?>               
                
            </div>
        </div>
        </div><div class="col-md-2"></div></div></div>
    </div>
<?php } ?>
    <!--Section 3 Ends-->

     
<?php
$query4="SELECT * FROM su_partners WHERE partner_language='en' and partner_status='active' ORDER BY `partner_ID` ASC ";
$result4=mysqli_query($db, $query4);
$sum4 = mysqli_num_rows($result4);
if($sum4 >0 ){
?>               
    <section class="ourPartnerSec">
            <div class="ourPrtnrCnt">
                <h2> Our Partners </h2>
                                        
                <div class="partnersSlider owl-carousel owl-theme">
                <!-- <div class="partnersSlider"> -->
                 <?php while($row4=mysqli_fetch_array($result4)){ ?>   
                    <div class="item">
                        <a href="<?=$row4['partner_link'];?>" target="_blank"><img src="<?=$mediaPath.'partners/'.$row4["partner_img"];?>" alt="<?=$row4["partner_name"];?>"></a>
                    </div>
                 <?php } ?> 
                                     
                </div>
        </div>
    </section>
<?php }?>     

<?php include('footer.php') ?>