<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Compressor</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="container">
  <h1>PHP Image Size Compressor</h1>
  <form method="post" action="" enctype="multipart/form-data">
    <input type="file" name="imagefile">
    <input type="submit" value="Upload" name="upload">
    <?php
      if(isset($_POST['upload'])){

        // Getting file name
        $filename = $_FILES['imagefile']['name'];
 
        // Valid extension
        $valid_ext = array('png','jpeg','jpg');

        // Location
        $location = "images/".$filename;

        // file extension
        $file_extension = pathinfo($location, PATHINFO_EXTENSION);
        $file_extension = strtolower($file_extension);

        // Check extension
        if(in_array($file_extension,$valid_ext)){

          // Compress Image
          compressImage($_FILES['imagefile']['tmp_name'],$location,60);

        }else{
          echo "<div class='error'>Invalid file type.</div>";
        }
      }

      // Compress image
      function compressImage($source, $destination, $quality) {

        $info = getimagesize($source);

        if ($info['mime'] == 'image/jpeg') 
          $image = imagecreatefromjpeg($source);

        elseif ($info['mime'] == 'image/gif') 
          $image = imagecreatefromgif($source);

        elseif ($info['mime'] == 'image/png') 
          $image = imagecreatefrompng($source);

        imagejpeg($image, $destination, $quality);

      }
    ?>
  </form>
</div>
</body>
</html>