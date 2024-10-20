<?php
 $target_dir="uploads/";
 $target_files=$target_dir.basename($_FILES['fileToUpload']['name']);
 $uploadsuccess=move_uploaded_file($_FILES['fileToUpload']['temp'],$target_files);
 if ($uploadsuccess) {
    echo "fileUpload successfuly";
 }
 else{
    echo("upload file error please try again");
 }

?>

