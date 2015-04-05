<?php
 
// foreach ($_FILES["images"]["error"] as $key => $error) {
//   if ($error == UPLOAD_ERR_OK) {
//     $name = $_FILES["images"]["name"][$key];
//     //echo $name;
// $_FILES['file']['tmp_name'];
    if($_FILES['image']['name'] != ""){
	    move_uploaded_file( $_FILES["image"]["tmp_name"], "uploads/" . $_FILES['image']['name']);

	    echo "uploads/".$_FILES['image']['name'];
	}
	else echo "";
//   }
// }
 
//echo "<h2>Successfully Uploaded Images</h2>";