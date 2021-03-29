<?php

include '../../connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $idBanner = $_POST['idBanner'];
    $namaBanner = $_POST['namaBanner'];

    if ($_FILES['file_banner']['name'] != '') {

        $allowed_ext = array("jpg", "png", "jpeg");
        $ext = end(explode('.', $_FILES['file_banner']['name']));
        if (in_array($ext, $allowed_ext)) {

            if ($_FILES["file_banner"]["size"] < 5000000) {

                $name = md5(rand()) . '.' . $ext;
                $path = "../../file/banner/" . $name;
                //echo $path;
                if (move_uploaded_file($_FILES["file_banner"]["tmp_name"], $path)) {

                    $query = "UPDATE `banner` SET `namaBanner`='$namaBanner', `file`='$name'  
                     WHERE idBanner='$idBanner' ";
                    //echo $query;
                    $result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
                    if ($result == true) {
                        echo json_encode(array(
                            "success" => true,
                            "message" => "Sukses Update Banner"
                        ));
                    } else {
                        echo json_encode(array(
                            "success" => false,
                            "message" => "Gagal Update Banner"
                        ));
                    }
                    mysqli_close($dbc);
                } else {
                    echo json_encode(array(
                        "success" => false,
                        "message" => "Gagal Update File Banner"
                    ));
                }
            } else {
                echo json_encode(array(
                    "success" => false,
                    "message" => "Ukuran Gambar terlalu besar, maksimal 5MB"
                ));
            }
        } else {
            //echo "tdk da";
        }
    } else {
        // echo json_encode(array(
        //     "success" => false,
        //     "message" => "Tidak Ada File Banner"
        // ));
        $query = "UPDATE `banner` SET `namaBanner`='$namaBanner'
        WHERE idBanner='$idBanner' ";

        $result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
        if ($result == true) {
            echo json_encode(array(
                "success" => true,
                "message" => "Sukses Update Banner"
            ));
        } else {
            echo json_encode(array(
                "success" => false,
                "message" => "Gagal Update Banner"
            ));
        }
        mysqli_close($dbc);
    }
}
