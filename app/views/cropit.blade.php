<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    <style>
      .cropit-image-preview {
        background-color: #f8f8f8;
        background-size: cover;
        border: 5px solid #ccc;
        border-radius: 3px;
        margin-top: 7px;
        width: 560px;
        height: 250px;
        cursor: move;
      }

      .cropit-image-background {
        opacity: .2;
        cursor: auto;
      }

      .image-size-label {
        margin-top: 10px;
      }

      input {
        /* Use relative position to prevent from being covered by image background */
        position: relative;
        z-index: 10;
        display: block;
      }

      .export {
        margin-top: 10px;
      }
    </style>
</head>
<body>


    <form method="post" id="cover">
      <div class="image-editor">
        <input type="file" class="cropit-image-input">
        <div class="cropit-image-preview"></div>
        <div class="image-size-label">
          Resize image
        </div>
        <input type="range" class="cropit-image-zoom-input form-control">
        <input type="hidden" name="image-data" class="hidden-image-data" />
        <button type="submit">Submit</button>
      </div>
    </form>

    <div id="result">
      <code>$form.serialize() =</code>
      <code id="result-data"></code>
    </div>



	<script src="{{ asset('jquery-1.11.1.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('cropit/jquery.cropit.js') }}"></script>
    <script>
      $(function() {
        $('.image-editor').cropit({
          exportZoom: 1.25,
          imageBackground: true,
          imageBackgroundBorderWidth: 20
        });

        $('form').submit(function() {
          // Move cropped image data to hidden input
          var imageData = $('.image-editor').cropit('export');
          $('.hidden-image-data').val(imageData);

          // Print HTTP request params
          var formValue = $(this).serialize();
          $('#result-data').text(formValue);

          // Prevent the form from actually submitting
          return true;
        });
      });
    </script>
</body>
</html>
