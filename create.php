<?php include_once("create_backend.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
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
                    <h2 class="mt-5">Create Record</h2>
                    <p>Please fill this form and submit to add record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Width</label>
                            <input type="text" name="width" id="width" class="form-control <?php echo (!empty($width_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $width; ?>">
                            <span class="invalid-feedback"><?php echo $width_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Height</label>
                            <input type="text" name="height" id="height" class="form-control <?php echo (!empty($height_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $height; ?>">
                            <span class="invalid-feedback"><?php echo $height_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Length</label>
                            <input type="text" name="length" id="length" class="form-control <?php echo (!empty($length_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $length; ?>">
                            <span class="invalid-feedback"><?php echo $length_err;?></span>
                        </div>
                        <input type="submit" id="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
