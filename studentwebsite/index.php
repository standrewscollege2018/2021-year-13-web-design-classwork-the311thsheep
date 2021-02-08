<?php
  include("dbconnect.php");

  include("navbar.php");

if (isset($_GET['page'])) {
  $page = $_GET['page'];
  include("$page.php");
} else {
  include("home.php");
}
 ?>
