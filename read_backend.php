<?php
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    require_once "config.php";
    $sql = "SELECT * FROM operation WHERE id = ?";

    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        $param_id = trim($_GET["id"]);

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

        }

        else{
            echo "Oops! Something went wrong. Please try again later.";
        }
        if(isset($_GET['action'])){
             $result = calculateVolume($width,$length,$height);
             die(json_encode($result));
           }

    }

    mysqli_stmt_close($stmt);

    mysqli_close($link);
}
 else{

    header("location: error.php");
    exit();
}
function calculateVolume($width,$length,$height) {
    $volume =$width*$length*$height;
    return $volume;
}
?>
