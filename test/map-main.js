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
      '<h1 class="firstHeading" type="button" onclick="mapSearch(\'' + 'Central and Western' +'\')">Central and Western</h1>'+
      '<div id="bodyContent">'+
      '<p><b>Hong Kong Trail I</b>, Hardness: ★★★</p>'+
      '<p><b>Hong Kong Trail II</b>, Hardness: ★</p>'+
      '</div>'+
      '</div>';
    contentString[1] = 
        '<div id="description">'+
        '<h1 class="firstHeading" type="button" onclick="mapSearch(\'' + 'Southern' +'\')">Southern</h1>'+
        '<div id="bodyContent">'+
        '<p type="button" onclick="smallMap(\'' + 'hktrain3' + '\')"><b>Hong Kong Trail III</b>, Hardness: ★★★★</p>'+
        '<p type="button" onclick="smallMap(\'' + 'hktrain4' + '\')"><b>Hong Kong Trail IV</b>, Hardness: ★★</p>'+
        '<p type="button" onclick="smallMap(\'' + 'hktrain7' + '\')"><b>Hong Kong Trail VII</b>, Hardness: ★</p>'+
        '<p type="button" onclick="smallMap(\'' + 'lamma' + '\')"><b>Lamma Island</b>, Hardness: ★★★</p>'+
        '</div>'+
        '</div>';
    contentString[2] = 
        '<div id="description">'+
        '<h1 class="firstHeading" type="button" onclick="mapSearch(\'' + 'Islands' +'\')">Islands</h1>'+
        '<div id="bodyContent">'+
        '<p type="button" onclick="smallMap(\'' + 'islands' + '\')"><b>Lo Fu Tau Country Trail</b>, Hardness: ★★</p>'+
        '</div>'+
        '</div>';
    contentString[3] = 
        '<div id="description">'+
        '<h1 class="firstHeading" type="button" onclick="mapSearch(\'' + 'Sai Kung' +'\')">Sai Kung</h1>'+
        '<div id="bodyContent">'+
        '<p type="button" onclick="smallMap(\'' + 'beitan' + '\')"><b>Pak Tam Country Trail</b>, Hardness: ★★</p>'+
        '</div>'+
        '</div>';
      contentString[4]=
        '<div id="description">'+
        '<h1 class="firstHeading" onclick="mapSearch(\'' + 'Sha Tin' + '\')">Sha Tin</h1>'+
        '<div id="bodyContent">'+
        '<p type="button" onclick="smallMap(\'' + 'Ma On Shan' + '\')"><b>Ma On Shan Country Trail</b>, Hardness: ★★★</p>'+
        '</div>'+
        '</div>';
      contentString[5]=
        '<div id="description">'+
        '<h1 class="firstHeading" type="button" onclick="mapSearch(\'' + 'Tai Po' +'\')">Tai Po</h1>'+
        '<div id="bodyContent">'+
        '<p><b>Tai Mei Tuk</b>, Hardness: ★★</p>'
        '</div>'+
        '</div>';
      contentString[6]=
        '<div id="description">'+
        '<h1 class="firstHeading" type="button" onclick="mapSearch(\'' + 'Yuen Long' +'\')">Yuen Long</h1>'+
        '<div id="bodyContent">'+
        '<p><b>Yuen Tsuen Ancient Trail</b>, Hardness: ★★</p>'+
        '</div>'+
        '</div>';
      contentString[7]=
        '<div id="description">'+
        '<h1 class="firstHeading" type="button" onclick="mapSearch(\'' + 'Tsuen Wan' +'\')">Tsuen Wan</h1>'+
        '<div id="bodyContent">'+
        '<p><b>Lai Chi Wo</b>, Hardness: ★★</p>'+
        '</div>'+
        '</div>';
      contentString[8]=
        '<div id="description">'+
        '<h1 class="firstHeading" type="button" onclick="mapSearch(\'' + 'Eastern' +'\')">Eastern</h1>'+
        '<div id="bodyContent">'+
        '<p><b>Hong Kong Trail V</b>, Hardness: ★</p>'+
        '<p><b>Hong Kong Trail VI</b>, Hardness: ★★★</p>'+
        '</div>'+
        '</div>';


    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 11,//map zoom size
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