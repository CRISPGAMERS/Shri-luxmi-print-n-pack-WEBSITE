var map;
function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: -1.277335, lng: 36.818145},
    zoom: 18
  });
  var marker = new google.maps.Marker({
    position:{lat: -1.277335, lng: 36.818145},
    map:map,
    icon:'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'
  })
  var contentString = '<div id="content">'+
  '<div id="siteNotice">'+
  '</div>'+
  '<h1 id="firstHeading" class="firstHeading">EPW</h1>'+
  '<div id="bodyContent">'+
  '<p><b>EXECUTIVE Printing Works ltd(EPW) - Mission:</b><br>Our Mission is to provide high quality print services ' +
  'services to our clients with timely delivery and customer satisfaction. '+
  'The passion we have for our work enables us to undertake of our clients '+
  'jobs. We constantly strive to deliver the highest-quality products possible. '+
  'There is no greater satisfaction than delivering a finished product '+
  'that helps a client reach their goals and objectives. '+
  '<p>EPW, <a href="https://http://executive.office-on-the.net/">'+
  '</div>'+
  '</div>';
  var locationInfo = new google.maps.InfoWindow({
    content:contentString
  });
  marker.addListener('click', function(){
    locationInfo.open(map, marker);
  })
}
$(document).ready(function(){
  $(initMap)
})
