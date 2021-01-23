<?php include('header.php') ?>
<?php
$query="SELECT * FROM su_pages WHERE page_language='en' and page_name='himma-system' ";
$result=mysqli_query($db, $query);
$row=mysqli_fetch_array($result);

$query2="SELECT * FROM su_documents WHERE language='en' ";
$result2=mysqli_query($db, $query2);
$row2=mysqli_fetch_array($result2);
?>

    <section class="topSec" style="">
        <div class="bgImgCnt" style="background-image: url('<?=$mediaPath.'pages/'.$row["page_img"]?>')"></div>
    </section>

<?php
$query3="SELECT * FROM su_slider WHERE slider_language='en' and slider_status='active' and slider_position='himma_system' ";
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
            <div class="imgCont" align="center"><img alt="" src="https://ummahhost.com/synew/images/himmahLogo.svg"></div>
            <div class="cntntCnt justify">
                <h1><?=$row["page_title"];?></h1>
                <?=stripslashes($row["page_detail"]);?>
            </div>
        </div>
    </section>

    <section class="commonSldrSec">
        <div class="container">
            <div class="commonSldrCnt">
                <div class="commonSlider _cardSlider owl-carousel owl-theme">
                    <div class="item">
                        <img src="images/cardFront.svg" />
                    </div>
                    <div class="item">
                        <img src="images/cardBack.svg" />
                    </div>
                </div>    
            </div>
        </div>
    </section>
    
<?php
$query4="SELECT * FROM su_membership_cat WHERE language='en' and mem_cat_status='active' ORDER BY `mem_ID` ASC ";
$result4=mysqli_query($db, $query4);
$sum4 = mysqli_num_rows($result4);
if($sum4 >0 ){ ?>    
    <section class="cntntSec">
        <div class="container">
            <div class="row">
                <div class="_cardsCont">
                    
                  <?php while($row4=mysqli_fetch_array($result4)){ ?>   
                    <div class="cardRaw d_f">
                        <div class="cardBx">
                            <div class="_cntnt">
                                <h2> <?=$row4['mem_cat_title'];?> </h2>
                                <p> <?=$row4['mem_cat_miles'];?> </p>
                            </div>
                        </div>
                        <div class="cardBx">
                            <img src="<?=$mediaPath.'membership/'.$row4['mem_cat_card'];?>" alt="<?=$row4['mem_cat_title'];?>">
                        </div>
                        <div class="cardBx">
                            <img src="<?=$mediaPath.'membership/'.$row4['mem_cat_inquiry'];?>" alt="<?=$row4['mem_cat_title'];?>">
                        </div>
                    </div>
                  <?php } ?>
                    
                </div>
            </div>
            <div class="cntntCnt">
                <p>
                    For more information, please
                    <u><a style="cursor:pointer;" id="bookletview"> click here</a></u>
                </p>
                <div id="book">
                   <style>.embed-container { position: relative; padding-bottom:56.25%; height:0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%;}</style><div class='embed-container' data-page-width='500' data-page-height='500' id='ypembedcontainer' ><iframe   src="https://www.yumpu.com/en/embed/view/ZQfjDdsVKYr3z4C1" frameborder="0" allowfullscreen="true"  allowtransparency="true"></iframe></div><script src='https://players.yumpu.com/modules/embed/yp_r_iframe.js' ></script>

                </div>
            </div>
        </div>
    </section>
    
<style> #book{display:none;} </style>
<script type="text/javascript">
window.onload = function(){
		document.getElementById("bookletview").onclick = function() {
				//alert("clicked"); 
				document.getElementById('book').style.display = 'block';
				return false;
		}
}
</script>
    
     
       
<?php } ?>

<?php include('footer.php') ?>