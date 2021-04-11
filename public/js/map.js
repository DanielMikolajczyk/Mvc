function initMap() {
  const cracow = { lat: 50.061, lng: 19.936 };
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 13,
    center: cracow,
  });
  const marker = new google.maps.Marker({
    position: cracow,
    map: map,
  });
}