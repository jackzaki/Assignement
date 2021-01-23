<?php include('header.php') ?>
<?php
$query="SELECT * FROM su_pages WHERE page_language='en' and page_name='careers' ";
$result=mysqli_query($db, $query);
$row=mysqli_fetch_array($result);

$query2="SELECT * FROM su_page_category WHERE id='".$row['page_category']."' and language='en' ";
$result2=mysqli_query($db, $query2);
$row2=mysqli_fetch_array($result2);
?>

<?php
if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];
$phone = $_POST["phone"];
$intrestedin = $_POST["intrestedin"];
$resume = $_FILES["myfile1"]["name"];

   $path = "uploads/careers/"; //set your folder path
    //set the valid file extensions 
    $valid_formats = array("pdf"); //add the formats you want to upload

				if(isset($_FILES["myfile1"]["name"]))
				{
							$name1 = $_FILES['myfile1']['name']; //get the name of the file
							$size1 = $_FILES['myfile1']['size']; //get the size of the file
							
							if (strlen($name1)) { //check if the file is selected or cancelled after pressing the browse button.
        list($txt, $ext) = explode(".", $name1); //extract the name and extension of the file
        if (in_array($ext, $valid_formats)) { //if the file is valid go on.
            if ($size1 < 200098888) { // check if the file size is more than 2 mb
                $file_name1 = $_FILES['myfile1']['name']; //get the file name			
																$file_name1 = rand() . basename($_FILES["myfile1"]["name"]);													
                $tmp1 = $_FILES['myfile1']['tmp_name'];
																
																$temp = explode(".", $_FILES["myfile1"]["name"]);
																$newfilename = round(microtime(true)) . '.' . end($temp);

                if (move_uploaded_file($tmp1, $path . $newfilename)) { //check if it the file move successfully.
															 $resume =	$newfilename;
																$msg =  "File uploading done.";
                } else {
                    $msg =  "failed";
                }
            } else {
                $msg =  "File size max 200 MB";
            }
        } else {
            $msg =  "Invalid file format..";
        }
    } else {
        $msg =  "Please select a file..!";
    }
	}
				
				
$EmailTo = "syedahs@outlook.com";
$Subject = "A New Resume Received";

// prepare email body text
$Fields .= "Name: ";
$Fields .= $name;
$Fields .= "\n\n";

$Fields.= "Position: ";
$Fields .= $intrestedin;
$Fields .= "\n\n";

$Fields.= "Phone: ";
$Fields .= $phone;
$Fields .= "\n\n";

$Fields.= "Email: ";
$Fields .= $email;
$Fields .= "\n\n";

$Fields .= "Cover Letter: ";
$Fields .= $message;
$Fields .= "\n\n";

$Fields .= "Resume: ";
$Fields .= $sitepath."en/uploads/careers/".$resume;
$Fields .= "\n";

// send email
$success = mail($EmailTo,  $Subject,  $Fields, "From:".$email);

	$msg =  "<div class='alert alert-success'>
	Thank you for contacting us, your email has been sent to our special department.
	</div>";		

}
?>



    <section class="topSec" style="">
        <div class="bgImgCnt" style="background-image: url('<?=$mediaPath.'pages/'.$row["page_img"]?>')"></div>
    </section>

<?php
$query3="SELECT * FROM su_slider WHERE slider_language='en' and slider_status='active' and slider_position='careers' ";
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
                

                
         <div class="container">
            <div class="row text-center animation-element fade-in">
                <div class="col-md-12 loginFormCnt careerfrm">
                    <form id="contact-form" name="contact_form" class="default-form" action="" method="post" enctype="multipart/form-data">
                            <div class="row clearfix">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group inputBox">
                                        <input type="text" name="name" id="name" class="form-control" value="" placeholder="Full Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group inputBox">
                                        <input type="text" name="position" id="position" class="form-control" value="" placeholder="Position" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group inputBox">
                                        <input type="email" name="email" id="email" class="form-control required email" value="" placeholder="Email" required>
                                    </div>
                                </div>
                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group inputBox">
                                        <input type="text" name="phone" id="phone" class="form-control" value="" placeholder="Phone" required>
                                    </div>
                                </div>
                                
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group inputBox">
                                        <textarea name="message" id="message" class="form-control textarea required" placeholder="Cover Letter"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group inputBox">
                                        <input type="file" class="form-control " name="myfile1" id="myfile1" placeholder="Resume" required/>
                                    </div>
                                </div>   
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group inputBox">
                                        <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
                                        <button class="thm-btn btn-style-two button cta submitquer submit" type="submit" data-loading-text="Please wait...">SEND</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    <div align="center" class="message_box" style="margin:10px 0px;"><? if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") { echo $msg; } ?></div>
                </div>
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