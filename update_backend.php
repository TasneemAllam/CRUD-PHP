<?php
require_once "config.php";

$name = $width = $height = $length = "";
$name_err = $width_err = $height_err = $length_err ="";

if(isset($_POST["id"]) && !empty($_POST["id"])){
    $id = $_POST["id"];

    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }

    $input_width = trim($_POST["width"]);
    if(empty($input_width)){
        $width_err = "Please enter an width.";
    } else{
        $width = $input_width;
    }

    $input_height = trim($_POST["height"]);
    if(empty($input_height)){
        $height_err = "Please enter an height.";
    } else{
        $height = $input_height;
    }

    $input_length = trim($_POST["length"]);
    if(empty($input_length)){
        $length_err = "Please enter an length.";
    } else{
        $length = $input_length;
    }

    if(empty($name_err) && empty($width_err) && empty($height_err) && empty($length_err)){
        $sql = "UPDATE operation SET name=?, width=?, height=?, length=? WHERE id=?";

        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "ssssi", $param_name, $param_width, $param_height , $param_length, $param_id);

            $param_name = $name;
            $param_width = $width;
            $param_height = $height;
            $param_length = $length;
            $param_id = $id;

            if(mysqli_stmt_execute($stmt)){
                header("location: index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        mysqli_stmt_close($stmt);
    }

    mysqli_close($link);
} else{
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        $id =  trim($_GET["id"]);

        $sql = "SELECT * FROM operation WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            $param_id = $id;

            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);

                if(mysqli_num_rows($result) == 1){

                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    $name = $row["name"];
                    $width = $row["width"];
                    $height = $row["height"];
                    $length = $row["length"];
                } else{
                    header("location: error.php");
                    exit();
                }

            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }


        mysqli_stmt_close($stmt);

        mysqli_close($link);
    }  else{
        header("location: error.php");
        exit();
    }
}
?>
