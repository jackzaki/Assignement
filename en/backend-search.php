<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "ummahhost_synew", "ummahhost_synew", "ummahhost_synew"); 

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$term = mysqli_real_escape_string($link, $_REQUEST['term']);

if(isset($term)){

    // Attempt select query execution
				$sql = "SELECT * FROM su_pages WHERE page_title LIKE '%" . $term . "%' OR page_detail LIKE '%" . $term . "%' AND page_language='en' ";
    $sql2 = "SELECT * FROM su_posts WHERE post_title LIKE '%" . $term . "%' OR post_detail LIKE '%" . $term . "%' AND post_language='en' ";
				$result2 = mysqli_query($link, $sql2);

    if($result = mysqli_query($link, $sql)){

        if(mysqli_num_rows($result) > 0 || mysqli_num_rows($result2) > 0){

            while($row = mysqli_fetch_array($result)){ ?> 

               <a href="https://<?php echo $_SERVER['SERVER_NAME'];?>/synew/en/<?php echo $row['page_name'];?>.php">

               <p><?php echo $row['page_title'];?></p></a>

            <?php } ?>
            
            <? if(mysqli_num_rows($result2) > 0){
													while($row2 = mysqli_fetch_array($result2)){ ?>
              
              <a href="https://<?php echo $_SERVER['SERVER_NAME'];?>/synew/en/post.php?<?php echo $row2['post_name'];?>">
               <p><?php echo $row2['post_title'];?></p></a>  
           
											 <?php } } ?>
            

            <?php // Close result set
           mysqli_free_result($result); 
        } else{
            echo "<p>No matches found</p>";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
// close connection
mysqli_close($link);

?>