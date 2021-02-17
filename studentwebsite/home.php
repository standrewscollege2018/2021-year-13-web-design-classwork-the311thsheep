<!-- homepage -->

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Welcome to St Andrew's College!</h1>
    <form class="form-inline my-2 my-lg-0" action="index.php?page=searchresults" method="post">
      <input required type="text" name="search" placeholder="Student name">
      <button type="btn btn-outline-success my-2 my-sm-0" name="button">Search</button>
    </form>
  </div>
</div>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Add new tutor</h1>
    <form class="form-inline my-2 my-lg-0" action="index.php?page=insert_tutor" method="post">
      <input required type="text" name="tutor_name" placeholder="tutor name">
      <input required type="text" name="tutor_code" placeholder="tutor code">
      <input required type="text" name="tutor_photo" placeholder="tutor photo">
      <button type="btn btn-outline-success my-2 my-sm-0" name="submit_button">Submit</button>
    </form>
    <?php
    if (isset($_GET['error'])) {
      $error = $_GET['error'];
      echo("<p> insert error= $error </p>");
    } else {
      $tutorname = $_GET['name'];
      echo("<p> new record created succesfully: tutorname - $tutorname</p>");
    }
      ?>
  </div>
</div>
