



<div class="row">
  <!-- camera div -->
  <div class="col-6">
    <p class="lead">scan barcode</p>
      <video id="video" width="640" height="480" style='border: 5px solid #111;' autoplay></video>
      <button id="snap">Snap Photo</button>
      <canvas id="canvas" style='border: 5px solid #111;'></canvas>
</div>


  <div class="col-6">
    <!-- item div -->
    <div class="">
    <p class="lead">browse products</p>
    <?php
    // selects search query from database
      $product_sql = "SELECT * FROM `products` WHERE `products`.`cert`= 1;";

      $product_qry = mysqli_query($dbconnect, $product_sql);

      if(mysqli_num_rows($product_qry)==0) {
        // no products error message
          echo "<h1>No products found</h1>";
        } else {
          $product_aa = mysqli_fetch_assoc($product_qry);
    // displays product name, photo
    ?>
    <!-- all products are in a row -->
    <div class="row">
    <?php
          do {
            $name = $product_aa['name'];
            $barcode = $product_aa['barcode'];
            $image = $product_aa['image'];
            ?>

    <!-- student card -->
            <div class="card col-4 bg-success" style="">
              <!-- img -->
              <img class="card-img-top" src="images/<?php echo $image; ?>" alt="Card image cap">
              <div class="card-body">
                <!-- name -->
                <h5 class="card-title"><?php echo "$name $barcode"; ?></h5>

              </div>
            </div>
          <?php
            } while ($product_aa = mysqli_fetch_assoc($product_qry));
    ?></div><?php

      }

     ?>
   </div>
     <!-- add item div -->
     <div class="">
       <h1 class="display-4">Add new item</h1>
       <form class="form-inline my-2 my-lg-0" action="index.php?page=insertitem" method="post">
         <input required type="text" name="item_name" placeholder="item name">
         <input required type="text" name="item_code" placeholder="item barcode">
         <input required type="text" name="item_image" placeholder="item image">
         <input required type="radio" name="item_cert" placeholder="item certification">
         <button type="btn btn-outline-success my-2 my-sm-0" name="submit_button">Submit</button>
       </form>
       <!-- form errorcodes -->
       <?php
       if (isset($_GET['error'])) {
         $error = $_GET['error'];
         echo("<p> insert error= $error </p>");
       } else {
         echo("<p> new record created succesfully</p>");
       }
?>
     </div>
  </div>
</div>


<script>


		// Put event listeners into place
		window.addEventListener("DOMContentLoaded", function() {
			// Grab elements, create settings, etc.
            var canvas = document.getElementById('canvas');
            var context = canvas.getContext('2d');
            var video = document.getElementById('video');
            var mediaConfig =  { video: true };
            var errBack = function(e) {
            	console.log('An error has occurred!', e)
            };

			// Put video listeners into place
            if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                navigator.mediaDevices.getUserMedia(mediaConfig).then(function(stream) {
					//video.src = window.URL.createObjectURL(stream);
					video.srcObject = stream;
                    video.play();
                });
            }

            /* Legacy code below! */
            else if(navigator.getUserMedia) { // Standard
				navigator.getUserMedia(mediaConfig, function(stream) {
					video.src = stream;
					video.play();
				}, errBack);
			} else if(navigator.webkitGetUserMedia) { // WebKit-prefixed
				navigator.webkitGetUserMedia(mediaConfig, function(stream){
					video.src = window.webkitURL.createObjectURL(stream);
					video.play();
				}, errBack);
			} else if(navigator.mozGetUserMedia) { // Mozilla-prefixed
				navigator.mozGetUserMedia(mediaConfig, function(stream){
					video.src = window.URL.createObjectURL(stream);
					video.play();
				}, errBack);
			}

			// Trigger photo take
			document.getElementById('snap').addEventListener('click', function() {
				context.drawImage(video, 0, 0, 640, 480);
			});
		}, false);
</script>
</html>
