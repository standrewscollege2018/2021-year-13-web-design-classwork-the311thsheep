<?php
// inserts new item into database

$name = $_POST['item_name'];
$code = $_POST['item_code'];
$image = $_POST['$image'];
$cert = $_POST['item_cert'];

$result_sql = "SELECT * FROM products WHERE barcode LIKE '$code'";

$result_qry = mysqli_query($dbconnect, $result_sql);

if(mysqli_num_rows($result_qry)!=0) {
    echo "<h1>duplicates of item code</h1>";
    header('Location: index.php?page=home&error=codeduplicate');
  } else {
    // add to table if no duplicates
    $sql = "INSERT INTO products (name, barcode, cert)
   VALUES ('$name', '$code', '$cert')";

   $target_dir = "uploads/";
   $target_file = $target_dir . basename($_FILES["$image"]["$image"]);
   $uploadOk = 1;
   $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

   // Check if image file is a actual image or fake image
   if(isset($_POST["submit"])) {
     $check = getimagesize($_FILES["$image"]["tmp_name"]);
     if($check !== false) {
       echo "File is an image - " . $check["mime"] . ".";
       $uploadOk = 1;
     } else {
       echo "File is not an image.";
       $uploadOk = 0;
     }
   }

   // Check if file already exists
   if (file_exists($target_file)) {
     header('Location: index.php?page=home&error=Sorry,_file_already_exists.');
     $uploadOk = 0;
   }

   // Check file size
   if ($_FILES["$image"]["size"] > 500000) {
     header('Location: index.php?page=home&error=Sorry,_your_file_is_too_large.');
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
     if (move_uploaded_file($_FILES["$image"]["tmp_name"], $target_file)) {
       echo "The file ". htmlspecialchars( basename( $_FILES["$image"]["$image"])). " has been uploaded.";
     } else {
       echo "Sorry, there was an error uploading your file.";
     }
   }



   if ($dbconnect->query($sql) === TRUE) {
     header('Location: index.php?page=home');
   } else {
     echo "Error: " . $sql . "<br>" . $dbconnect->error;
   }

 }
