<?php
$target_dir = "uploads/";

//requirement
require 'conn.php';


//special bool
$uploadbool=FALSE;
//USER Details
$userid=$_POST['userid'];
$emailid=$_POST['emailid'];

//DIRECT TARGET FILES
$target_file1 = $target_dir .$userid. basename($_FILES["photo"]["name"]);
$target_file2 = $target_dir .$userid. basename($_FILES["10thmarksheet"]["name"]);
$target_file3 = $target_dir .$userid. basename($_FILES["12thmarksheet"]["name"]);
$target_file4 = $target_dir .$userid. basename($_FILES["12thpassing"]["name"]);
$target_file5 = $target_dir .$userid. basename($_FILES["aadharcard"]["name"]);
$target_file6 = $target_dir .$userid. basename($_FILES["signature"]["name"]);
$target_file7 = $target_dir .$userid. basename($_FILES["gradmarksheet"]["name"]);
$target_file8 = $target_dir .$userid. basename($_FILES["provisional"]["name"]);
$target_file9 = $target_dir .$userid. basename($_FILES["postgradmarksheet"]["name"]);
$target_file10 = $target_dir .$userid. basename($_FILES["passport"]["name"]);
$target_file11 = $target_dir .$userid. basename($_FILES["thumbimpression"]["name"]);

//FILES NAME
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

//DIFERENT VARIABLES


    if ((move_uploaded_file($photo, $target_file1)==TRUE) && (move_uploaded_file($tenmark, $target_file2)==TRUE) && (move_uploaded_file($twemark, $target_file3)==TRUE) && (move_uploaded_file($twepassing, $target_file4)==TRUE) && (move_uploaded_file($aadharcard, $target_file5)==TRUE) && (move_uploaded_file($signature, $target_file6)==TRUE) && (move_uploaded_file($gradmarksheet, $target_file7)==TRUE) && (move_uploaded_file($provisional, $target_file8)==TRUE) && (move_uploaded_file($postgradmarksheet, $target_file9)==TRUE) && (move_uploaded_file($passport, $target_file10)==TRUE) && (move_uploaded_file($thumbimpression, $target_file11)==TRUE) ) {

    }


    if (TRUE) {

      $reg_query="UPDATE details SET photo='/".$target_file1."' WHERE userid=".$userid.";";
      $reg_query1="UPDATE details SET aadharpic='/".$target_file5."' WHERE userid=".$userid.";";
      $reg_query2="UPDATE details SET 10markpic='/".$target_file2."' WHERE userid=".$userid.";";
      $reg_query3="UPDATE details SET 12markpic='/".$target_file3."' WHERE userid=".$userid.";";
      $reg_query4="UPDATE details SET 12passing='/".$target_file4."' WHERE userid=".$userid.";";
      $reg_query5="UPDATE details SET gradpassing='/".$target_file6."' WHERE userid=".$userid.";";
      $reg_query6="UPDATE details SET provisional='/".$target_file7."' WHERE userid=".$userid.";";
      $reg_query7="UPDATE details SET postgraduation='/".$target_file8."' WHERE userid=".$userid.";";
      $reg_query8="UPDATE details SET passport='/".$target_file9."' WHERE userid=".$userid.";";
      $reg_query9="UPDATE details SET signpic='/".$target_file10."' WHERE userid=".$userid.";";
      $reg_query10="UPDATE details SET thumbpic='/".$target_file11."' WHERE userid=".$userid.";";

      if(($conn->query($reg_query)==TRUE) && ($conn->query($reg_query1)==TRUE) && ($conn->query($reg_query2)==TRUE) && ($conn->query($reg_query3)==TRUE) && ($conn->query($reg_query4)==TRUE) && ($conn->query($reg_query5)==TRUE) && ($conn->query($reg_query6)==TRUE) && ($conn->query($reg_query7)==TRUE) && ($conn->query($reg_query8)==TRUE) && ($conn->query($reg_query9)==TRUE) && ($conn->query($reg_query10)==TRUE))
      {

        $updatequery="UPDATE reguser SET stepcomplete=3 WHERE userid=".$userid;
        if($conn->query($updatequery)==TRUE)
        {
          $updatequery="UPDATE reguser SET stepcomplete=3 WHERE userid=".$userid;
          if($conn->query($updatequery)==TRUE)
          {
            header("Location: /userpage.php?loginmail=".$emailid);
          }
          else {
            echo "Error in PHP";
          }
        }
        else {
          echo "Error in PHP";
        }
      }
      else {
        echo "ISSUE";
      }
    }
?>
