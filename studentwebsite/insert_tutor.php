<?php
// inserts new tutor into database

if(!isset($_POST['tutor_name'])) {
  header("Location: insert.php");
}
$name = $_POST['tutor_name'];
$code = $_POST['tutor_code'];
$photo = $_POST['tutor_photo'];

$result_sql = "SELECT * FROM tutorgroup WHERE tutorcode LIKE '%$code%'";

$result_qry = mysqli_query($dbconnect, $result_sql);

if(mysqli_num_rows($result_qry)!=0) {
    echo "<h1>duplicates of tutorcode</h1>";
    header('Location: index.php?page=home&error=codeduplicate');
  } else {
    // add to table if no duplicates
    $sql = "INSERT INTO tutorgroup (tutor, tutorcode, photo)
   VALUES ('$name', '$code', '$photo.jpg')";

   if ($dbconnect->query($sql) === TRUE) {
     header('Location: index.php?page=home');
   } else {
     echo "Error: " . $sql . "<br>" . $dbconnect->error;
   }

 }


?>
