$(document).ready(function(){

	/*************************************************/
	/****************** EVENEMENTS *******************/
	/*************************************************/

	// Double-Clic sur wrapper change sa couleur et celle de tous les <li>
	jQuery("body").on("dblclick", ".wrapper", function() {
		jQuery(this).css("background-color", "white");
		jQuery("li").css("background-color", "yellow");
	});

	jQuery("body").on("click", ".selectCategory", function() {
		jQuery(".category").slideToggle("slow");
  });

	jQuery("body").on("click", ".selectStep", function() {
		jQuery(".step").slideToggle("slow");
  });

	jQuery("body").on("click", ".Logo", function() {
		jQuery(".Instruction").css("display", "none");
		jQuery(".Form").css("display", "block");
		jQuery("input").css("display", "inline-block");
  });

});
