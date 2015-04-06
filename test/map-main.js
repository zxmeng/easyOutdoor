  function initialize(){
    var locations = [
      ['中西區', 22.277024, 114.147949],
      ['南區', 22.245251, 114.198074],
      ['離島區', 22.254784, 113.943329],
      ['西貢區', 22.399602, 114.331970],
      ['沙田區', 22.391349, 114.225540],
      ['大埔區北區', 22.466244, 114.166489],
      ['元朗屯門區', 22.456091, 114.039459],
      ['荃灣區', 22.360236, 114.156189],
      ['東區', 22.270035, 114.230347]
    ];


    var contentString = [];
    contentString[0] = 
      '<div id="description">'+
      '<h1 class="firstHeading">中西區</h1>'+
      '<div id="bodyContent">'+
      '<p><b>港島徑一</b>，難度係數一顆星</p>'+
      '<p><b>港島徑二</b>，難度係數三顆星</p>'+
      '</div>'+
      '</div>';
    contentString[1] = 
          '<div id="description">'+
      '<h1 class="firstHeading">南區</h1>'+
      '<div id="bodyContent">'+
      '<p><b>港島徑三</b>，難度係數一顆星</p>'+
      '<p><b>港島徑四</b>，難度係數三顆星</p>'+
      '<p><b>港島徑七</b>，難度係數四顆星</p>'+
      '<p><b>南丫島家樂徑</b>，難度係數一顆星</p>'+
      '</div>'+
      '</div>';
    contentString[2] = 
          '<div id="description">'+
      '<h1 class="firstHeading">離島區</h1>'+
      '<div id="bodyContent">'+
      '<p><b>老虎頭郊遊區</b>，難度係數一顆星</p>'+
      '</div>'+
      '</div>';
    contentString[3] = 
          '<div id="description">'+
      '<h1 class="firstHeading">西貢區</h1>'+
      '<div id="bodyContent">'+
      '<p><b>北潭郊遊區</b>，難度係數一顆星</p>'+
      '</div>'+
      '</div>';
      contentString[4]=
            '<div id="description">'+
      '<h1 class="firstHeading">沙田區</h1>'+
      '<div id="bodyContent">'+
      '<p><b>馬鞍山郊遊區</b>，難度係數一顆星</p>'+
      '</div>'+
      '</div>';
      contentString[5]=
            '<div id="description">'+
      '<h1 class="firstHeading">大埔區北區</h1>'+
      '<div id="bodyContent">'+
      '<p><b>大美督家樂徑</b>，難度係數一顆星</p>'
      '</div>'+
      '</div>';
       contentString[6]=
      '<div id="description">'+
      '<h1 class="firstHeading">元朗屯門區</h1>'+
      '<div id="bodyContent">'+
      '<p><b>元荃古道</b>，難度係數一顆星</p>'+
      '</div>'+
      '</div>';
       contentString[7]=
      '<div id="description">'+
      '<h1 class="firstHeading">荃灣區</h1>'+
      '<div id="bodyContent">'+
      '<p><b>荔枝窩</b>，難度係數一顆星</p>'+
      '</div>'+
      '</div>';
      contentString[8]=
      '<div id="description">'+
      '<h1 class="firstHeading">東區</h1>'+
      '<div id="bodyContent">'+
      '<p><b>港島徑五</b>，難度係數三顆星</p>'+
      '<p><b>港島徑六</b>，難度係數一顆星</p>'+
      '</div>'+
      '</div>';


    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 10,
      center: new google.maps.LatLng(22.343090, 114.154816),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < 9; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
        icon: 'http://www.google.com/mapfiles/kml/pal2/icon12.png'
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(contentString[i]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }

  }

// google.maps.event.addDomListener(window, 'load', initialize);