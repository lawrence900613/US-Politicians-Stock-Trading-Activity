<?php
  $con = new PDO('pgsql:host=localhost;dbname=CMPT354', 'ubuntu', 'password');
  $result;
  if(!$con){
    echo "Error : uanble to open database\n";
  }else{
  
  try{
      $name = $_POST['name'];
      $DOB = pg_escape_string($_POST['DOB']);
      $Role = $_POST['Role'];
      $Party = $_POST['Party'];
      $State = $_POST['State'];
      $result = $con->query("INSERT INTO politicianrepresent(polname, dob, party, role, statename)VALUES('$name', '$DOB', '$Role', '$Party', '$State')");
    }catch (Exception $e) {
          echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
    $con = null;
    if($result){
       header("location: /politician/insert_politician.php?status=success");
    }else{
       header("location: /politician/insert_politician.php?status=fail");
    }
?>