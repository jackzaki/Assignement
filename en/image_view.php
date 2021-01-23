<?php include('header.php') ?>


    <section class="cntntSec">
        <div class="container">
            <div class="cntntCnt justify">
                <h1><?=$row["page_title"];?></h1>
                <?=stripslashes($row["page_detail"]);?>
                
																<link rel="stylesheet" type="text/css" href="css/news_style.css">
                <link rel="stylesheet" href="viewbox/viewbox.css">
                
                <?php
																$queryvideos="SELECT * FROM su_gallery WHERE language='en' and gallery_status='active' ORDER BY `gallery_ID` DESC ";
																$result_videos=mysqli_query($db, $queryvideos);
																$sum_vid = mysqli_num_rows($result_videos);
																if($sum_vid >0 ){  ?>
																<?php while($row_vid=mysqli_fetch_array($result_videos)){ ?>
																
																<div class="col-md-4 col-box"> 
                <div class="card default-color-dark"> 
                 <div class="view">
                  <a href="<?=$mediaPath.'gallery/'.$row_vid["gallery_img"]?>" class="image-link"><img src="<?=$mediaPath.'gallery/'.$row_vid["gallery_img"]?>" alt="<?=$row_vid["gallery_title"];?>" class="card-img-top "></a>
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
