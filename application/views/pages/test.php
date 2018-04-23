
<div class="content-wrapper">
  <div id="map"></div>

</div>


<script>
var map;
function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 5,
    center: {lat: 1.1321033, lng: 119.2250863},
    mapTypeId: 'roadmap'
  });

  function addMarker(feature) {
    var marker = new google.maps.Marker({
      position: feature.position,
      map: map
    });

    var infowindow = new google.maps.InfoWindow({
      content: feature.city
    })

    marker.addListener('mouseover', function(){
      infowindow.open(map, marker);
    });

    marker.addListener('mouseout', function(){
      infowindow.close();
    })
  }

  var features = [
    {
      position: new google.maps.LatLng(-6.827680, 107.623524),
      type: 'Point',
      city: 'Bandung'
    }, {
      position: new google.maps.LatLng(-6.238274, 106.832508),
      type: 'Point',
      city: 'Jakarta'
    }, {
      position: new google.maps.LatLng(-6.423902, 106.107411),
      type: 'Point',
      city: 'Banten'
    }, {
      position: new google.maps.LatLng(-7.004909, 110.463490),
      type: 'Point',
      city: 'Semarang'
    }, {
      position: new google.maps.LatLng(-6.238274, 106.832508),
      type: 'Point',
      city: 'Jakarta'
    }, {
      position: new google.maps.LatLng(-7.794778, 110.371479),
      type: 'Point',
      city: 'Yogyakarta'
    }, {
      position: new google.maps.LatLng(-7.259727, 112.755512),
      type: 'Point',
      city: 'Surabaya'
    }
  ];

  for (var i = 0, feature; feature = features[i]; i++) {
    addMarker(feature);
  }

  console.log(features);

}

</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUoWqGCq9EUtLVrgNkZ_Ekx1RZ6jbM8Ms&callback=initMap">
</script>
