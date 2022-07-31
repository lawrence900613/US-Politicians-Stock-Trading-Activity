<?php
  $con = new PDO('pgsql:host=localhost;dbname=CMPT354', 'ubuntu', 'password');
  $result;
  if(!$con){
    echo "Error : uanble to open database\n";
  }else{
      $Name = $_POST['Name'];
      $DOB = pg_escape_string($_POST['DOB']);
      try{
        $result = $con->query("DELETE FROM politicianrepresent WHERE polname = '$Name' AND dob = '$DOB'");
      }catch (Exception $e) {
          echo 'Caught exception: ',  $e->getMessage(), "\n";
      }
    }
    $con = null;
    if($result){
       header("location: /politician/delete_politician.php?status=success");
    }else{
       header("location: /politician/delete_politician.php?status=fail");
    }
?>

