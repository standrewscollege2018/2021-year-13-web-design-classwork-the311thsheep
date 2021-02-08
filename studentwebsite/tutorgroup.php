<?php
// select sent tutorinfo
if(!isset($_GET['tutorgroupID'])) {
  header("Location: index.php");
} else {
  // select all tutorinfo
  $tutorcode = $_GET['tutorcode'];
  $tutorgroupID = $_GET['tutorgroupID'];
  $tutor_sql = "SELECT * FROM student WHERE tutorgroupID=$tutorgroupID";
  $tutor_qry = mysqli_query($dbconnect, $tutor_sql);

  if(mysqli_num_rows($tutor_qry)==0) {
    // no students error message
    echo "<p>No students in $tutorcode</p>";
  } else {
    // tutorname
    $tutor_aa = mysqli_fetch_assoc($tutor_qry);
?><div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4"><?php $tutorcode ?></h1>
  </div>
</div><?php

    do {
      // displays student name and photo
      $firstname = $tutor_aa['firstname'];
      $lastname = $tutor_aa['lastname'];
      $photo = $tutor_aa['photo'];

      echo "<img src='images/$photo' class=''>";
      echo "<p>$firstname $lastname</p>";

    } while ($tutor_aa = mysqli_fetch_assoc($tutor_qry));
  }
}

?>
