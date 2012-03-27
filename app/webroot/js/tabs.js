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
