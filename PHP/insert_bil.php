<?php
  $con = new PDO('pgsql:host=localhost;dbname=CMPT354', 'ubuntu', 'password');
  $result;
  if(!$con){
    echo "Error : uanble to open database\n";
  }else{
  
    $ID = $_POST['ID'];
    $Year = $_POST['Year'];
    $Status = $_POST['Status'];
    $Beneficiary = $_POST['Beneficiary'];
    $type = $_POST['type'];
    
    $result = $con->query("INSERT INTO bill(id, year)VALUES('$ID', '$Year')");
    
    if(strcmp($type, "Private") == 0){
      $query = "INSERT INTO billprivate(id, year, status, beneficiary)VALUES('$ID', '$Year', '$Status', '$Beneficiary')";
    }
    else{
      $query = "INSERT INTO billpublic(id, year, status)VALUES('$ID', '$Year', '$Status')";
    }

    
    $result = $con->query($query);
    }
    $con = null;
    if($result){
       header("location: /bill/insert_bill.php?status=success");
    }else{
       header("location: /bill/insert_bill.php?status=fail");
    }
?>