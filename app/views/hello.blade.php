<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('guillotine/css/jquery.guillotine.css') }}">
	<link rel="stylesheet" href="{{ asset('guillotine/demo/demo.css') }}">


</head>
<body>

		        <div class='frame'>
      				<img id='sample_picture' src="{{ asset('images.jpg') }}">
	    		</div>

				    <div id='controls'>
				      <button id='rotate_left'  type='button' title='Rotate left'> &lt; </button>
				      <button id='zoom_out'     type='button' title='Zoom out'> - </button>
				      <button id='fit'          type='button' title='Fit image'> [ ]  </button>
				      <button id='zoom_in'      type='button' title='Zoom in'> + </button>
				      <button id='rotate_right' type='button' title='Rotate right'> &gt; </button>
				    </div>

				    <form method="post">

			    	<ul id='data'>
				      <div class='column'>
				        <li>x: <input type="text" name="x" id='x' /></li>
				        <li>y: <input type="text" name="y" id='y' /></li>
				      </div>
				      <div class='column'>
				        <li>width:  <input type="text" name="w" id='w' /></li>
				        <li>height: <input type="text" name="h" id='h' /></li>
				      </div>
				      <div class='column'>
				        <li>scale: <input type="text" name="scale" id='scale' /></li>
				        <li>angle: <input type="text" name="angle" id='angle' /></li>
				      </div>
				    </ul>

				    <button type="submit">Submit</button>
				    	
				    </form>




	<script src="{{ asset('jquery-1.11.1.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('guillotine/js/jquery.guillotine.js') }}"></script>
  <script type='text/javascript'>
    jQuery(function() {

      var picture = jQuery('#sample_picture');

      console.log(picture);

      picture.on('load', function(){

      	console.log("Loaded");
        // Initialize plugin (with custom event)
        picture.guillotine({width: 1500, height: 500, eventOnChange: 'guillotinechange'});

        // Display inital data
        var data = picture.guillotine('getData');
        for(var key in data) { jQuery('#'+key).val(data[key]); }

        // Bind button actions
        jQuery('#rotate_left').click(function(){ picture.guillotine('rotateLeft'); });
        jQuery('#rotate_right').click(function(){ picture.guillotine('rotateRight'); });
        jQuery('#fit').click(function(){ picture.guillotine('fit'); });
        jQuery('#zoom_in').click(function(){ picture.guillotine('zoomIn'); });
        jQuery('#zoom_out').click(function(){ picture.guillotine('zoomOut'); });

        // Update data on change
        picture.on('guillotinechange', function(ev, data, action) {

          console.log('Fired',data);
          data.scale = parseFloat(data.scale.toFixed(4));
          for(var k in data) { jQuery('#'+k).val(data[k]); }
        });

      });
    });
  </script>
</body>
</html>
