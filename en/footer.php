
        <!--Social Media Section-->
        <div class="socialmedia">
            <div class="smIcons">
                <?php if(!empty($website_facebook)){?><a href="<?=$website_facebook;?>" target="_blank"><i class="icon-facebook-1"></i></a><? }?>
                <?php if(!empty($website_instagram)){?><a href="<?=$website_instagram;?>" target="_blank"><i class="icon-instagram"></i></a><? }?>
                <?php if(!empty($website_twitter)){?><a href="<?=$website_twitter;?>" target="_blank"><i class="icon-twitter"></i></a><? }?>
                <?php if(!empty($website_youtube)){?><a href="<?=$website_youtube;?>" target="_blank"><i class="icon-youtube-play"></i></a><? }?>
                <span>Follow us</span>
            </div>
												<?php if(!empty($website_phone)){?><div class="number">
                <a href="tel:<?=$website_phone;?>"><img src="images/phoneicon.png" /><?=$website_phone;?></a>
            </div><? }?>
            <?php if(!empty($website_email)){?><div class="email">
                <a href="mailto:<?=$website_email;?>"><img src="images/emailicon.png" /><?=$website_email?></a>
            </div><? }?>
        </div>
        <!--Social Media Section Ends-->
        
        <!--Footer Section Starts-->
        <footer>
           <?php /*?><div class="footer-logo">
                <div><a href="<?=$sitepath;?>en/"><img src="<?=$mediaPath.'logo/'.$website_logolight;?>" alt="<?=$website_title;?>" /></a></div>
                <div>
                    <p>
                    <?=$website_footertext;?>
                    </p>
                </div>
            </div><?php */?>
            <div class="footer-nav">
                <ul>
                    <li><a href="about.php">Who we are</a></li>
                    <li><a href="signin.php">Join us </a></li>
                    <li><a href="contact.php">Connect with us</a></li>
                    <li><a href="signin.php">Membership </a></li>
                </ul>
            </div>
            <div class="footer-nav">
                <ul>
                    <li><a href="centers.php">Media centers</a></li>
                    <li><a href="tracks.php">Our tracks</a></li>
                    <li><a href="news.php">Our news </a></li>
                    <li><a href="volunteers.php">Volunteer with us</a></li>
                </ul>
            </div>
            
        </footer>
        <div class="copyright">
            <div>© Copyright <?php echo date("Y"); ?> Sharjah Youth - All Rights Reserved</div>
            <div>Design & Developed by <a href="https://ummahdesign.me/" target="_blank">Ummah Design</a></div>
            
        </div>
    </div>

    <div class="preloader_container">
        <div class="item-1"></div>
        <div class="item-2"></div>
        <div class="item-3"></div>
        <div class="item-4"></div>
        <div class="item-5"></div>
    </div>


<!--For Search-->
<style type="text/css">
    /* Formatting search box */
    .search-box{
        position: relative;
        display: inline-block;
    }
    .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
									height: 400px;
overflow-y: auto;
overflow-x: hidden;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
								margin:0 20px;
    }
    /* Formatting result items */
    .result p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result p:hover{
        background: #f2f2f2;
    }
</style>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>

    <div class="searchOverlay">
        <button class="searchClose"><i class="icon-cancel"></i></button>
        <button class="searchbtn" type="submit">Search</button>
        <?php /*?><input class="searchinput" type="text" autocomplete="off" placeholder="Type here" /><?php */?>
        <div class="search-box">
         <input type="text" class="searchinput" autocomplete="off" placeholder="Type here" />
         <div class="result"></div>
        </div>
    </div>

<!--End Search-->    

    <script src="js/jquery.js"></script>
				<script src="js/anime.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="owlcarusel/owl.carousel.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/script.js"></script>
	
</body>
</html>
