<?php
  $con = new PDO('pgsql:host=localhost;dbname=CMPT354', 'ubuntu', 'password');
  $result;
  if(!$con){
    echo "Error : uanble to open database\n";
  }else{
  
    $State = $_POST['State'];
    $Party = $_POST['Party'];
    
    try{
        $result = $con->query("UPDATE statelocation SET dominantparty='$Party' WHERE statename = '$State'");
  
      }catch (Exception $e) {
          echo 'Caught exception: ',  $e->getMessage(), "\n";
      }
    

    }

    if($result){
       header("location: /state/state_update.php?status=success");
    }else{
       header("location: /state/state_update.php?status=fail");
    }
?>