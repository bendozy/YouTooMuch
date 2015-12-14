$(document).ready(function(){
	console.log('DOM is ready for parsing');

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="XSRF-TOKEN"]').attr('content')
		}
	});

	var files;

	$('#file').on('change', prepareUpload);

	$('#uploadForm').submit(function(e){
		e.preventDefault();
		 
		var data = new FormData();
		
		$.each(files, function(key, value) {
			data.append('image', value);

		});

		uploadImage(data, function(response){
			console.log(response);
		});

	});

	function uploadImage(data, callback) {
		console.log(data);
		$.ajax({
			url: '/upload',
			type: 'post',
			processData: false,
			contentType: false,
			data: data,
			success: function(response) {
				callback(response);
			},
			error: function(response) {
				callback(response);
			}
		});
	}

	function prepareUpload(event) {
		files = event.target.files;
	}
});

