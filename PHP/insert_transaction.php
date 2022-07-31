<?php
  $con = new PDO('pgsql:host=localhost;dbname=CMPT354', 'ubuntu', 'password');
  $result;
  if(!$con){
    echo "Error : uanble to open database\n";
  }else{
    $Polname = $_POST['Polname'];
    $DOB = pg_escape_string($_POST['DOB']);
    $Ticker = $_POST['Ticker'];
    $Action= $_POST['Action'];
    $Valfloor= $_POST['Valfloor'];
    $Valceil= $_POST['Valceil'];
    $Time = $_POST['Time'];
    
    if($Valfloor > $Valceil){
      header("location: /transaction/insert_transaction.php?status=valerror");
      $result = -1;
    }else{
      try{
        $result = $con->query("INSERT INTO transaction(polname, dob, ticker, action, valfloor, valceil, time)VALUES('$Polname', '$DOB', '$Ticker', '$Action', '$Valfloor','$Valceil','$Time')");
      }catch (Exception $e) {
          echo 'Caught exception: ',  $e->getMessage(), "\n";
      }
    }
  }
  $con = null;
  if($result == -1){
    header("location: /transaction/insert_transaction.php?status=valerror");
  }else if($result){
     header("location: /transaction/insert_transaction.php?status=success");
  }else{
    header("location: /transaction/insert_transaction.php?status=fail");
  }
?>