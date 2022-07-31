<?php
  $con = new PDO('pgsql:host=localhost;dbname=CMPT354', 'ubuntu', 'password');
  $result;
  $result_count_pol;
  $count;
  if(!$con){
    echo "Error : uanble to open database\n";
  }else{
    $Fmname = $_POST['Fmname'];
    $FmDOB = pg_escape_string($_POST['FmDOB']);
    $Polname = $_POST['Polname'];
    $Relationship = $_POST['Relationship'];
    $PolDOB = pg_escape_string($_POST['PolDOB']);
    
    try{
      $result_count_pol = $con->query("SELECT count(*) FROM politicianrepresent WHERE polname ='$Polname' AND dob = '$PolDOB'");
      $count = $result_count_pol->fetch();
    }catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
    
    if(!$count['count']){
      header("location: /insert_familymember.php?status=noPol");
    }else{
      try{
        $result = $con->query("INSERT INTO familymemberdetails(fmname,polname,fm_dob,relationship)VALUES('$Fmname','$Polname','$FmDOB','$Relationship')");
      }catch (Exception $e) {
          echo 'Caught exception: ',  $e->getMessage(), "\n";
      }
      
      try{
        $result2 = $con->query("INSERT INTO familymemberrelationship(fmname, polname, poldob)VALUES('$Fmname', '$Polname','$PolDOB')");
      }catch (Exception $e) {
          echo 'Caught exception: ',  $e->getMessage(), "\n";
      }
      
    }
  }
    if(!$count['count']){
      header("location: /politician/insert_familymember.php?status=noPol");
    }else if($result && $result2){
       header("location: /politician/insert_familymember.php?status=success");
    }else if($result2){
      header("location: /politician/insert_familymember.php?status=success");
    }
    else{
       header("location: /politician/insert_familymember.php?status=fail");
    }
?>