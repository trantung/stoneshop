$(function() {	
	$(".promotion_rate").each(function () {

	    var thisJ = $(this);
	    var max = thisJ.attr("max") * 1;
	    var min = thisJ.attr("min") * 1;
	    var intOnly = String(thisJ.attr("intOnly")).toLowerCase() == "true";

	    var test = function (str) {
	        return str == "" || /* (!intOnly && str == ".") || */
	            ($.isNumeric(str) && str * 1 <= max && str * 1 >= min &&
	            (!intOnly || str.indexOf(".") == -1) && str.match(/^0\d/) == null);
	            // commented out code would allow entries like ".7"
	    };

	    thisJ.keydown(function () {
	        var str = thisJ.val();
	        if (test(str)) thisJ.data("dwnval", str);
	    });

	    thisJ.keyup(function () {
	        var str = thisJ.val();
	        if (!test(str)) thisJ.val(thisJ.data("dwnval"));
	    })
	});

	$(".item-type").change(function(){
		var val = $(this).val();
		if(val == "0"){
			$(".upload-item").hide();
		}else{
			$(".upload-item").show();
		}
	});
});