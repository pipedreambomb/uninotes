    var map = null;
    var geocoder = null;

    // use jQuery to set page load/unload behaviour. 
    // assumes jQuery is already loaded
    $(document).ready(function() { 
	    initialize();
    });
   
    $(document).unload(function() { 
	    GUnload();
    });

    function initialize() {
      if (GBrowserIsCompatible()) {
        map = new GMap2(document.getElementById("map_canvas"));
        map.setCenter(new GLatLng(37.4419, -122.1419), 1);
        map.setUIToDefault();
        geocoder = new GClientGeocoder();
      }
    }

    function showAddress(address) {
      if (geocoder) {
        geocoder.getLatLng(
          address,
          function(point) {
            if (!point) {
              alert(address + " not found");
            } else {
              map.setCenter(point, 15);
	map.setZoom(6);
              var marker = new GMarker(point, {draggable: true});
              map.addOverlay(marker);
              GEvent.addListener(marker, "dragend", function() {
                marker.openInfoWindowHtml(address);
              });
              GEvent.addListener(marker, "click", function() {
                marker.openInfoWindowHtml(address);
              });
	      GEvent.trigger(marker, "click");
            }
          }
        );
      }
    }
