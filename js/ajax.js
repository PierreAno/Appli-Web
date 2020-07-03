$(document).ready(function(){

/*------------------------------------------------------------------------------
	WEB :
------------------------------------------------------------------------------*/




/*==============================
	JQuery functions
==============================*/

// Button click : Connection Customer
jQuery("body").on("click", ".doLog", function() {
	var lastName = jQuery("input[name='lastName']").val();
	var firstName = jQuery("input[name='firstName']").val();
	sendAjax("./frontoffice/doLogin", {lastName: lastName, firstName: firstName});
});

jQuery("body").on("click", ".smiley5", function() {
	var list1 = jQuery('.list1').val();
	var list2 = jQuery('.list2').val();
	var review5 = jQuery("input[name='smiley5']").val();
	sendAjax("./frontoffice/doInsert", {list1: list1, list2: list2, review5: review5});
});

jQuery("body").on("click", ".smiley4", function() {
	var list1 = jQuery('.list1').val();
	var list2 = jQuery('.list2').val();
	var review4 = jQuery("input[name='smiley4']").val();
	sendAjax("./frontoffice/doInsert", {list1: list1, list2: list2, review4: review4});
});

jQuery("body").on("click", ".smiley3", function() {
	var list1 = jQuery('.list1').val();
	var list2 = jQuery('.list2').val();
	var review3 = jQuery("input[name='smiley3']").val();
	sendAjax("./frontoffice/doInsert", {list1: list1, list2: list2, review3: review3});
});

jQuery("body").on("click", ".smiley2", function() {
	var list1 = jQuery('.list1').val();
	var list2 = jQuery('.list2').val();
	var review2 = jQuery("input[name='smiley2']").val();
	sendAjax("./frontoffice/doInsert", {list1: list1, list2: list2, review2: review2});
});

jQuery("body").on("click", ".smiley1", function() {
	var list1 = jQuery('.list1').val();
	var list2 = jQuery('.list2').val();
	var review1 = jQuery("input[name='smiley1']").val();
	sendAjax("./frontoffice/doInsert", {list1: list1, list2: list2, review1: review1});
});
//====================================================================================================================================================================


/*==============================
	JQuery events
==============================*/

	// Polling updating tower list
	//window.setInterval(sendAjax, 1000, "updateList");



/*==============================
	JS objects
==============================*/



/*==============================
	JS functions
==============================*/

	// General function sending JSON data to server
	function sendAjax(serverUrl, jsonData) {
		serializedData = JSON.stringify(jsonData);
		jQuery.ajax({type: 'POST', url: serverUrl, dataType: 'json', data: "data=" + serializedData,
			success: function(data) {
				displayAjax(data);
			}
		});
	}

	// --- General function displaying JSON data from server
	// Syntax from server : [{target:".htmlClass", html:"html"}, {target:"htmlElement", html:"html", insert:"append"}, {action:"reloadPage"}]
	function displayAjax(data) {
		for (var val of data) {
			// Insert data into HTML (insert or replace)
			if (defined(val.target) && defined(val.html)) {
				if (val.insert == "prepend") {
					jQuery(val.target).prepend(val.html);
				} else if (val.insert == "append") {
					jQuery(val.target).append(val.html);
				} else {
					jQuery(val.target).html(val.html);
				}
			}
			// Reload page
			else if (val.action == "reloadPage") {
				location.reload();
			}
		}
	}

	// --- Test whether a variable is defined or not
	function defined(myVar) {
		if (typeof myVar != 'undefined') return true;
		return false;
	}



});
