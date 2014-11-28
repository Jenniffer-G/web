var map = new google.maps.Map(document.getElementById('map'), {
  zoom: 13,
  center: new google.maps.LatLng(3.382621, -76.541985),
  mapTypeId: google.maps.MapTypeId.ROADMAP
});

function dragStart(ev) {
   ev.dataTransfer.effectAllowed='move';
   ev.dataTransfer.setData("Text", ev.target.getAttribute('id'));
   ev.dataTransfer.setDragImage(ev.target,0,0);
   var lugarID = ev.target.getAttribute('id');
   $.ajax({
      type: "GET",
      url: "api/lugares.php",
      data: { LugID: lugarID }
    }).done(function(){
      console.log("Solicitud enviada al API");
    }).success(function(result){
      resultado = JSON.parse(result);
      console.log(resultado);
      var infowindow = new google.maps.InfoWindow();
      var marker, i;
      if (!resultado.error) {
        for (i=0; i<resultado.locations.length; i++){
          	marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1]),
            map: map
          });

          google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
              infowindow.setContent(locations[i][0]);
              infowindow.open(map, marker);
            }
          })(marker, i));
        }
      }
    }).error(function(error){
      console.log("Error: "+error);
    })
   return true;
}
function dragEnter(ev) {
   event.preventDefault();
   return true;
}
function dragOver(ev) {
    return false;
}

function dragDrop(ev) {
   var src = ev.dataTransfer.getData("Text");
   ev.target.appendChild(document.getElementById(src));
   
   ev.stopPropagation();
   return false;
}

function arrastrando(e){
	elemento=e.target;
	e.dataTransfer.setData('Text',elemento.getAttribute('id'));
	e.dataTransfer.setDragImage(e.target,62,62);
}