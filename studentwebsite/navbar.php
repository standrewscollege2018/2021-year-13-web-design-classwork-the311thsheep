<!-- navbar -->

<?php
// selects all tutorgroup names from database
$tutor_sql = "SELECT * FROM tutorgroup";
$tutor_qry = mysqli_query($dbconnect, $tutor_sql);
$tutor_aa = mysqli_fetch_assoc($tutor_qry);
 ?>

 <nav class="navbar navbar-expand-lg navbar-light bg-light">
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
     <a class="navbar-brand" href="#">Hidden brand</a>
     <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
<!-- stac home button -->
       <li class="nav-item active">
         <a class="nav-link" href="index.php">St Andrew's College<span class="sr-only">(current)</span></a>
       </li>
       <!-- tutor dropdown -->
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Tutor groups
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <!-- display tutor groups as dropdown -->
          <a <?php
            do {
              // displays all tutor names as links
              $tutorgroupID = $tutor_aa['tutorgroupID'];
              $tutorcode = $tutor_aa['tutorcode'];

              echo "<a href='index.php?page=tutorgroup&tutorgroupID=$tutorgroupID&tutorcode=$tutorcode'>$tutorcode</a>";

             } while ($tutor_aa = mysqli_fetch_assoc($tutor_qry))
          ?></a>
        </div>
      </li>
     </ul>
     <!-- search bar -->
     <form class="form-inline my-2 my-lg-0" action="index.php?page=searchresults" method="post">
       <input required type="text" name="search" placeholder="Student name">
       <button type="btn btn-outline-success my-2 my-sm-0" name="button">Search</button>
     </form>
   </div>
 </nav>

 <h2></h2>
 <?php

 ?>
