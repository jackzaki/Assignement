<?php include('header.php') ?>

<?php
$query="SELECT * FROM su_pages WHERE page_language='en' and page_name='volunteers' ";
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
$query3="SELECT * FROM su_slider WHERE slider_language='en' and slider_status='active' and slider_position='volunteers' ";
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
                    <li><a href="javascript:;"> <?=$row["page_title"];?> </a></li>
                </ul>
            </div>
        </div>
    </section>
    <section class="cntntSec">
        <div class="container">
            <div class="cntntCnt justify">
                <h1><?=$row["page_title"];?></h1>
                <?=stripslashes($row["page_detail"]);?>
                
                
            <div class="row text-center animation-element fade-in">
                <div class="col-md-12 loginFormCnt careerfrm">
                    <form id="register_form" name="register_form" class="default-form" action="" method="post" enctype="multipart/form-data">
                    
                            <div class="row clearfix">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group inputBox">
                                        <input type="text" name="name" id="name" class="form-control" value="" placeholder="Full Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group inputBox">
                                        <input type="email" name="email" id="email" class="form-control required email" value="" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group inputBox">
                                        <input type="text" name="phone" id="phone" class="form-control" value="" placeholder="Phone" required>
                                    </div>
                                </div>
                                 
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group inputBox">
                                        <textarea name="message" id="message" class="form-control textarea required" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                   
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group inputBox">
                                        <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
                                        <button class="thm-btn btn-style-two button cta registerquery submit" type="submit" data-loading-text="Please wait...">SEND</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    <div align="center" class="message_box" style="margin:10px 0px;"></div>
                </div>
            </div>
        
        
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