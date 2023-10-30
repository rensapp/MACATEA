function getUserLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    alert("Geolocation is not supported by this browser.");
  }
}

function showPosition(position) {
  var userLat = position.coords.latitude;
  var userLng = position.coords.longitude;

  document.getElementById("user_lat").textContent = "Latitude: " + userLat;
  document.getElementById("user_lng").textContent = "Longitude: " + userLng;
}
