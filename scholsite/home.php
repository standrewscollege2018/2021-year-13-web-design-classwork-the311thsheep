



<div class="row">
  <!-- camera div -->
  <div class="col-6">
    <p class="lead">scan barcode</p>
      <!-- <video id="video" width="100%" style='border: 5px solid #111;' autoplay></video>
      <button id="snap">Snap Photo</button>
      <canvas id="canvas" style='border: 5px solid #111;'></canvas> -->

      <input type="file" accept="image/jpg" capture="camera" id="recorder">
<video id="player" controls></video>
<script>
  var recorder = document.getElementById('recorder');
  var player = document.getElementById('player');

  recorder.addEventListener('change', function(e) {
    var file = e.target.files[0];
    // Do something with the video file.
    player.src = URL.createObjectURL(file);
  });
</script>

<video id="player" controls autoplay></video>
<script>
  const player = document.getElementById('player');

  const constraints = {
    video: true,
  };

  navigator.mediaDevices.getUserMedia()
    .then((stream) => {
      player.srcObject = stream;
    });
</script>
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
              <img class="card-img-top" src="uploads/<?php echo $name; ?>" alt="<?php echo $image; ?>">
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
       <?php include "enteritem.php"; ?>
     </div>
  </div>
</div>


<!-- <script>


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
					video.src = window.URL.createObjectURL(stream);
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
</script> -->
</html>
