<?php
if (isset($_POST['submit'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check if upload is ok
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            // Save the current timestamp
            $upload_time = date("Y-m-d H:i:s");

            // Send email confirmation
            $to = "user@example.com"; // Replace with user's email
            $subject = "File Uploaded Successfully";
            $message = "Your file " . basename($_FILES["fileToUpload"]["name"]) . " has been successfully uploaded on " . $upload_time;
            $headers = "From: no-reply@example.com";
            
            mail($to, $subject, $message, $headers);

            // Redirect to list of files with success message
            header("Location: list_files.php?upload_success=1&time=" . urlencode($upload_time));
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
 List_file.php
<?php
$dir = "uploads/";

if (isset($_GET['upload_success']) && $_GET['upload_success'] == 1) {
    echo "<p style='color:green;'>File uploaded successfully at " . $_GET['time'] . "</p>";
}

$files = scandir($dir);

if (count($files) > 2) { // Because '.' and '..' are also returned
    echo "<h2>Uploaded Files</h2>";
    echo "<ul>";
    foreach ($files as $file) {
        if ($file != "." && $file != "..") {
            echo "<li><a href='download.php?file=" . urlencode($file) . "'>$file</a></li>";
        }
    }
    echo "</ul>";
} else {
    echo "<p>No files uploaded yet.</p>";
}
?>

<a href="index.php">Go back to upload page</a>
