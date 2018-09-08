<?php
$target_dir = "uploads/";
$target_file1 = $target_dir . basename($_FILES["photo"]["name"]);
$target_file2 = $target_dir . basename($_FILES["10thmarksheet"]["name"]);
$target_file3 = $target_dir . basename($_FILES["12thmarksheet"]["name"]);
$target_file4 = $target_dir . basename($_FILES["12thpassing"]["name"]);
$target_file5 = $target_dir . basename($_FILES["aadharcard"]["name"]);
$target_file6 = $target_dir . basename($_FILES["signature"]["name"]);
$target_file7 = $target_dir . basename($_FILES["gradmarksheet"]["name"]);
$target_file8 = $target_dir . basename($_FILES["provisional"]["name"]);
$target_file9 = $target_dir . basename($_FILES["postgradmarksheet"]["name"]);
$target_file10 = $target_dir . basename($_FILES["passport"]["name"]);
$target_file11 = $target_dir . basename($_FILES["thumbimpression"]["name"]);


$photo = $_FILES["photo"]["tmp_name"];
$tenmark = $_FILES["10thmarksheet"]["tmp_name"];
$twemark = $_FILES["12thmarksheet"]["tmp_name"];
$twepassing = $_FILES["12thpassing"]["tmp_name"];
$aadharcard = $_FILES["aadharcard"]["tmp_name"];
$signature = $_FILES["signature"]["tmp_name"];
$gradmarksheet = $_FILES["gradmarksheet"]["tmp_name"];
$provisional = $_FILES["provisional"]["tmp_name"];
$postgradmarksheet = $_FILES["postgradmarksheet"]["tmp_name"];
$passport = $_FILES["passport"]["tmp_name"];
$thumbimpression = $_FILES["thumbimpression"]["tmp_name"];

    if ((move_uploaded_file($photo, $target_file1)==TRUE) && (move_uploaded_file($tenmark, $target_file2)==TRUE) && (move_uploaded_file($twemark, $target_file3)==TRUE) && (move_uploaded_file($twepassing, $target_file4)==TRUE) && (move_uploaded_file($aadharcard, $target_file5)==TRUE) && (move_uploaded_file($signature, $target_file6)==TRUE) && (move_uploaded_file($gradmarksheet, $target_file7)==TRUE) && (move_uploaded_file($provisional, $target_file8)==TRUE) && (move_uploaded_file($postgradmarksheet, $target_file9)==TRUE) && (move_uploaded_file($passport, $target_file10)==TRUE) && (move_uploaded_file($thumbimpression, $target_file11)==TRUE) ) {
        echo "Success";
    }

    else {
        echo "Sorry for the Inconvenience Caused, there was an error uploading your file.";
    }
?>
