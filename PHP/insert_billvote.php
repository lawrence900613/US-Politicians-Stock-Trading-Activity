<?php
  $con = new PDO('pgsql:host=localhost;dbname=CMPT354', 'ubuntu', 'password');
  $result;
  $result_count_bill;
  $count_bill;
  $result_count_pol;
  $count_pol;
  if(!$con){
    echo "Error : uanble to open database\n";
  }else
  {
    $Polname = $_POST['Polname'];
    $DOB = pg_escape_string($_POST['DOB']);
    $ID = $_POST['ID'];
    $Year = $_POST['Year'];
    $Action = $_POST['Action'];
    
    
    
    try{
      $result_count_bill = $con->query("SELECT count(*) FROM bill WHERE id ='$ID' AND year = '$Year'");
      $count_bill = $result_count_bill->fetch();
    }catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
    
    
    try{
      $result_count_pol = $con->query("SELECT count(*) FROM politicianrepresent WHERE polname ='$Polname' AND dob = '$DOB'");
      $count_pol = $result_count_pol->fetch();
    }catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
    
    
    if(!$count_pol['count'] || !$count_bill['count']){
      header("location: /insert_billvote.php?status=noPol");
    }else{
        try{  
          $result = $con->query("INSERT INTO billvote(polname, dob, id, year, action)VALUES('$Polname','$DOB','$ID','$Year','$Action')");
        }catch (Exception $e) {
          echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
  }
  
    $con = null;
    if(!$count_pol['count'] || !$count_bill['count']){
      header("location: /bill/insert_billvote.php?status=noPol_noBill");
    }else if($result){
       header("location: /bill/insert_billvote.php?status=success");
    }else{
       header("location: /bill/insert_billvote.php?status=exist");
    }
?>