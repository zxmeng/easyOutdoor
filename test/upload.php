<?php

// upload the selected image to server
if($_FILES['image']['name'] != ""){
    move_uploaded_file( $_FILES["image"]["tmp_name"], "uploads/" . $_FILES['image']['name']);

    echo "uploads/".$_FILES['image']['name'];
}
else echo "";
