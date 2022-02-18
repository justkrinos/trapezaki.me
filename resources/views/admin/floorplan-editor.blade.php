<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Fabric.js Restaurant reservation system</title>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.0/nouislider.min.css'><link rel="stylesheet" href="./style.css">


</head>
<body>
<!-- partial:index.partial.html -->



<div class="container-fluid text-center">
  <div class="form-group admin-menu">
    <div class="row">
      <div class="col-sm-2 col-sm-offset-3 form-group">
        <label>Width (px)</label>
        <input type="number" id="width" class="form-control" value="812" />
      </div>
      <div class="col-sm-2 form-group">
        <label>Height (px)</label>
        <input type="number" id="height" class="form-control" value="812" />
      </div>
      <div class="col-sm-2 form-group">
        <label>&nbsp;</label>
        <br />
        <button class="btn btn-primary" id="save">Save</button>
      </div>
    </div>
    <div class="btn-group">
      <button class="btn btn-primary rectangle">+ &#9647; Table</button>
      <button class="btn btn-primary circle">+ &#9711; Table</button>
      <button class="btn btn-primary triangle">+ &#9651; Table</button>
      <button class="btn btn-primary chair">+ Chair</button>
      <button class="btn btn-primary bar">+ Bar</button>
      <button class="btn btn-default wall">+ Wall</button>
      <button class="btn btn-danger remove">Remove</button>
      <button class="btn btn-warning customer-mode">Customer mode</button>
    </div>
  </div>
  
  <div class="form-group customer-menu" style="display: none;">
    <div class="btn-group">
      <button class="btn btn-success submit">Submit reservation</button>
      <button class="btn btn-warning admin-mode">Admin mode</button>
    </div>
    <br />
    <br />
    <div id="slider"></div>
    <div id="slider-value"></div>
  </div>
  
  <canvas id="canvas" width="812" height="812"></canvas>
</div>

<div class="modal fade" id="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body text-center">
        <p id="modal-table-id"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>
<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/fabric.js/1.7.11/fabric.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.0/nouislider.min.js" integrity="sha512-ZKqmaRVpwWCw7S7mEjC89jDdWRD/oMS0mlfH96mO0u3wrPYoN+lXmqvyptH4P9mY6zkoPTSy5U2SwKVXRY5tYQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="fabric-resv.js"></script>
<script  src="resv-options.js"></script>

</body>
</html>
