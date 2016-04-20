  var map;
  var no = 0;
  function initialize() {
  var myLatlng = new google.maps.LatLng(7.8731, 80.7718);

  var myOptions = {
     zoom: 7,
     center: myLatlng,
     mapTypeId: google.maps.MapTypeId.ROADMAP
     }
  map = new google.maps.Map(document.getElementById("map-canvas"), myOptions); 

  google.maps.event.addListener(map, "rightclick", function(event) {
  	if (no < 1) {
      addMarker(event.latLng,map);
    }
    no=no+1;
});

function addMarker(latlng,map) {

  var marker = new google.maps.Marker({
    draggable: true,
    position: latlng, 
    map: map,
    title: "Your location"
    });

   marker.addListener('drag',function(event) {
        document.getElementById('latbox').value = event.latLng.lat();
        document.getElementById('lngbox').value = event.latLng.lng();
    });

    marker.addListener('dragend',function(event) {
        document.getElementById('latbox').value = event.latLng.lat();
        document.getElementById('lngbox').value = event.latLng.lng();
    });
      
    }
      // populate yor box/field with lat, lng
      //alert("Lat=" + lat + "; Lng=" + lng);

}