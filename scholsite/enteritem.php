<!-- form to enter new item -->

<h1 class="display-4">Add new item</h1>
<form class="form-inline my-2 my-lg-0" action="index.php?page=insertitem" method="post" enctype="multipart/form-data">
  <input required type="text" name="item_name" placeholder="item name">
  <input required type="text" name="item_code" placeholder="item barcode">
      <input type="file" name="fileToUpload" id="fileToUpload">
  <input required type="text" name="item_cert" placeholder="item certification">
  <button type="btn btn-outline-success my-2 my-sm-0" name="submit_button">Submit</button>
</form>
<!-- form errorcodes -->
<?php
if (isset($_GET['error'])) {
  $error = $_GET['error'];
  echo("<div class='alert alert-danger' role='alert'>
      insert error= $error
    </div> ");
} else {
  echo("$name, $barcode");
}
?>
