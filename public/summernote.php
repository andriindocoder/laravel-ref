<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- include libraries(jQuery, bootstrap) -->
		<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">

		<!-- include summernote css/js -->
		<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
	</head>
	<body>

		<form method="post">
		  <textarea id="summernote" name="editordata"></textarea>
		</form>



		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
		<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 
		<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
		<script>
			$(document).ready(function() {
			  $('#summernote').summernote({
			    height: 500,                 // set editor height
			    minHeight: null,             // set minimum height of editor
			    maxHeight: null,             // set maximum height of editor
			    focus: true                  // set focus to editable area after initializing summernote
			  });
			});
		</script>
	</body>
</html>
