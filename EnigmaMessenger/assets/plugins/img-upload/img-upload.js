/**************************************/
/*** Plugin developed by: Sletheren ***/
/*** FahrenBYTE.com - Morocco *********/
/*** Open source under MIT ************/
/**************************************/

var uploads = 0;
var imagesPreview = function(input, placeToInsertInput , placeToInsertImagePreview) {
	if (input.files) {
		$('.input-img-label').remove();
		var reader = new FileReader();
		reader.onload = function(event) {
			var div = '<div class="col-xs-12 col-sm-6 col-md-3"><div class="preview-box"><span class="preview-delete fa fa-times" data-input="img-upload-input'+uploads+'"></span><img class="preview-img" src="'+event.target.result+'" alt="Image Uploaded"></div></div>';
			$(div).appendTo(placeToInsertImagePreview);
			uploads++;
			var label = '<label for="img-upload-input'+uploads+'" class="input-img-label"><span class="fa fa-plus"></span></label>';
			var inputfile = '<input type="file" id="img-upload-input'+uploads+'" class="img-upload-input" name="file[]" accept="image/*">';
			$(label).appendTo(placeToInsertInput);
			$(inputfile).appendTo(placeToInsertInput);

		}
		reader.readAsDataURL(input.files[0]);
		
	}

};
$(document).on('click','.preview-delete',function(){
	var id = $(this).data('input');
	$('#'+id).remove();
	$(this).parent().parent().remove();
	uploads--;
})
$(document).on('click','.preview-delete-ajax',function(){
	var $this = $(this);
	var url = $this.data('url');
	$.confirm({
		title: 'Confirm!',
		content: 'Do you want to delete this?',
		buttons: {
			confirm: function () {
				$.ajax({
					url: url,
					method: 'GET',
					success: function(e){
						$this.parent().parent().remove();
					},
					error: function(e){
					}
				})

			},
			cancel: function () {
			},
		}
	});

})
$(document).on('change','.img-upload-input', function() {
	imagesPreview(this,'.input-label-container', '.img-uploads');
});