/*------------------------------------------------------------------------------
# Copyright 2013 George Nixon
# 
# Licensed under the Apache License, Version 2.0 (the "License");
# you may not use this file except in compliance with the License.
# You may obtain a copy of the License at
# 
#   http://www.apache.org/licenses/LICENSE-2.0
# 
# Unless required by applicable law or agreed to in writing, software
# distributed under the License is distributed on an "AS IS" BASIS,
# WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
# See the License for the specific language governing permissions and
# limitations under the License.
#-----------------------------------------------------------------------------*/
// Please note that a lot of this code was adapted from Google 
// sample code.
 
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
		    // Could not geocode the address, so state this and give a link to change address for organization
		    var url = $("a#edit_org_btn").attr("href");
		    var editLink = "<a href='" + url + "'>correcting</a>";
		    $("#map_canvas").html("<em>" + address + " (Map could not be found for this organization, does this address need " + editLink + "?)</em>")
				.css('background-color', '#FFF');
            } else {
              map.setCenter(point, 15);
		map.setZoom(7);
              var marker = new GMarker(point, {draggable: true});
              map.addOverlay(marker);
              GEvent.addListener(marker, "dragend", function() {
                marker.openInfoWindowHtml(address);
              });
              GEvent.addListener(marker, "click", function() {
                marker.openInfoWindowHtml(address);
              });
//	      GEvent.trigger(marker, "click");
            }
          }
        );
      }
    }
