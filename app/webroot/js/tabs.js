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
-----------------------------------------------------------------------------*/
// JavaScript for handling tabbed content panes
$(document).ready(function(){
	
	$("#javascript_warning").hide();

	// When a tab heading is clicked
	$(".nav-tabs li").click(function(clickEvent) {
		// Make it look like the active tab
		$(".nav-tabs li").removeClass("active");
		$(this).addClass("active");
		// Make the related content visible 
		$(".tabbed_content").hide();
		var id = $(this).text().trim().toLowerCase();
		$("#" + id).show();
       	}); 
	
	// On doc load, show first tabbed pane
	$(".nav-tabs li a").first().trigger("click");
});
