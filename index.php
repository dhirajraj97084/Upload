<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>
<body>
    <h2>Upload a File</h2>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" required>
        <input type="submit" name="submit" value="Upload File">
    </form>    <br>
    <a href="list_files.php">View Uploaded File</a>
</body>
</html>
