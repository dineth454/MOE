var map;
function initMap() {
    var map = new google.maps.Map(document.getElementById("map-canvas"), {
        center: new google.maps.LatLng(7.8731, 80.7718),
        zoom: 7,
        minZoom:8,
        mapTypeId: 'roadmap'
      });

    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhSKzfElSK1IBSQgF1kGr2Iv6-JqeVUUA &callback=initMap"
}