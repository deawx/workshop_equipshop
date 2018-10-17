<div class="container my-5">
  <div class="row">
    <div class="col-lg-6">
      <h2>ติดต่อเรา</h2>
      <ul class="list-unstyled">
        <li><?=$contact['address'];?></li>
        <li><i class="fas fa-envelope"></i> : <?=$contact['email'];?></li>
        <li><i class="fas fa-phone-square"></i> : <?=$contact['phone'];?></li>
        <li><i class="fab fa-facebook"></i> : <?=$contact['facebook'];?></li>
        <li><i class="fab fa-line"></i> : <?=$contact['line'];?></li>
      </ul>
    </div>
    <div class="col-lg-6">
      <div id="map" class="w-100" style="height:400px;"></div>
      <script>
      function initMap() {
        var uluru = {lat: <?=$contact['latitude'];?>, lng: <?=$contact['longtitude'];?>};
        var map = new google.maps.Map(
          document.getElementById('map'), {zoom: 4, center: uluru});
          var marker = new google.maps.Marker({position: uluru, map: map});
        }
      </script>
      <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBC1HqMP74IoVLsfSuL54twrQlkCKH4gG4&callback=initMap"> </script>
    </div>
  </div>
  <hr>
</div>
