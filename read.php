<?php include_once("read_backend.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3">View Record</h1>
                    <div class="form-group">
                        <label>Name</label>
                        <p><b><?php echo $row["name"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Width</label>
                        <p ><b id="width"><?php echo $row["width"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Height</label>
                        <p id="height"><b><?php echo $row["height"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Length</label>
                        <p id="length"><b><?php echo $row["length"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label id="myLabel"></label>
                        <p name="volume" id="volume"><b></b></p>
                        <p><a id="submit" class="btn btn-primary"> Calculate Volume </a></p>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $("#submit").click(function() {
      $.ajax({
            type: "get",
            dataType:"json",
            data: { action: 'calculateVolume' },
           success: function(result) {
                $("#myLabel").text("volume");
                $("#volume").text(result);
           },
           error: function(result) {
               alert('error');
           }
          });
    });
  });
</script>
