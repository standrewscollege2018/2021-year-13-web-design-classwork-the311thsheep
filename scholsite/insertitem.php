<?php
// inserts new item into database

$name = $_POST['item_name'];
$code = $_POST['item_code'];
$image = $_POST['item_photo'];
$cert = $_POST['item_cert'];

$result_sql = "SELECT * FROM products WHERE barcode LIKE '$code'";

$result_qry = mysqli_query($dbconnect, $result_sql);

if(mysqli_num_rows($result_qry)!=0) {
    echo "<h1>duplicates of item code</h1>";
    header('Location: index.php?page=home&error=codeduplicate');
  } else {
    // add to table if no duplicates
    $sql = "INSERT INTO products (name, barcode, image, cert)
   VALUES ('$name', '$code', '$image', '$cert')";

   if ($dbconnect->query($sql) === TRUE) {
     header('Location: index.php?page=home');
   } else {
     echo "Error: " . $sql . "<br>" . $dbconnect->error;
   }

 }


?>
