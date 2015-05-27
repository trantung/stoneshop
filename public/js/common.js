$(function() {
    function bindCkeditor() {
			if($('#ckeditor_id').length > 0)
			{
	      CKEDITOR.replace( 'ckeditor_id',
	      {
	      filebrowserBrowseUrl : '/js/plugins/ckeditor/ckfinder/ckfinder.html',
	      filebrowserImageBrowseUrl : '/js/plugins/ckeditor/ckfinder/ckfinder.html?type=Images',
	      filebrowserFlashBrowseUrl : '/js/plugins/ckeditor/ckfinder/ckfinder.html?type=Flash',
	      filebrowserUploadUrl : '/js/plugins/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	      filebrowserImageUploadUrl : '/js/plugins/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
	      filebrowserFlashUploadUrl : '/js/plugins/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	      });
			}
    }
    $('html').on('refresh', bindCkeditor);
});

$(function() {
    function bindDatepicker() {
			if($('input.datepicker').length)
			{
        $('input.datepicker').datepicker({
            format: "yyyy-mm-dd"
        });
			}
       
    }
    $('html').on('refresh', bindDatepicker);
});

// Confirm deleting resources
$(function() {
		$("form[data-confirm]").submit(function() {
    		if ( ! confirm($(this).attr("data-confirm"))) 
				{
        		return false;
    		}
		});
});
