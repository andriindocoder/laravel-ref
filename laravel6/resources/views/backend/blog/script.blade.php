@section('script')
<script type="text/javascript">
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  </script>
  <script>
    $('ul.pagination').addClass('no-margin pagination-sm');

    $('#title').on('blur', function() {
      var theTitle = this.value.toLowerCase().trim(),
        slugInput = $('#slug'),
        theSlug = theTitle.replace(/&/g,'-and-')
                  .replace(/[^a-z0-9-]+/g,'-')
                  .replace(/\-\-+/g, '-')
                  .replace(/^-+|-+$/g, '');

        slugInput.val(theSlug);
    });

    var simplemde1 = new SimpleMDE({ element: $("#excerpt")[0] })
    // var simplemde2 = new SimpleMDE({ element: $("#body")[0] })
    // Summernote
    $('#body').summernote({
        airMode: false,
        height: 150,
        placeholder: 'Insert your text here',
        callbacks: {
        onImageUpload : function(files, editor, welEditable) {
 
             for(var i = files.length - 1; i >= 0; i--) {
                     sendFile(files[i], this);
            }
          }
        }
    });

    function sendFile(file, el) {
    var form_data = new FormData();
    form_data.append('file', file);
    console.log('sekoteng');
    $.ajax({
        data: form_data,
        type: "POST",
        url: 'editor-upload',
        cache: false,
        contentType: false,
        processData: false,
        success: function(url) {
            $(el).summernote('editor.insertImage', url);
        }
    });
    }

    $('#datetimepicker1').datetimepicker({
      format: 'YYYY-DD-MM HH:mm:ss',
      buttons: {
        showToday: true,
        showClear: true,
        showClose: true
      },
      icons: {
        clear: 'fa fa-trash'
      }
    });

    $('#draft-btn').on('click', function(e) {
      e.preventDefault();
      $('#published_at').val("");
      $('#post-form').submit();
    });
  </script>
@endsection