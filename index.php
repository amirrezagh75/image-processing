<?php
if(isset($_POST["submit"])) {
$target_dir = "Pic/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$tmp=$_FILES["fileToUpload"]["tmp_name"];
      $extension = explode("/", $_FILES["fileToUpload"]["type"]);
      $name="test2.jpg";
// Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
// Check if file already exists
if (file_exists($target_file)) {
    
    unlink("$target_file");
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "Pic/".$name)) {
        echo "Sorry, there was an error uploading your file.";
    }
    }
}
?>
<html>
    <head>
        <title>Image Processing</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="Uimg">
        <img id="scream" src="Pic/test2.jpg" alt="Raw Image">
    </div>
    <div class="process">
    <canvas id="myCanvas" alt="Raw Image" width="350" height="350">
        Your browser does not support the HTML5 canvas tag.</canvas>
        <script src="./js/function.js"></script>
    </div>
    <div class="form">
        <select name="Mode" id="mode" onchange="changeMode()">
                <option value="" selected>..</option>
                <option value="negative">Negative</option>
                <option value="blur">Blur</option>
        </select>
        <form action="<?=$_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
            Select an image:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Open" name="submit">
        </form>
    </div>
    
</body>
</html>
