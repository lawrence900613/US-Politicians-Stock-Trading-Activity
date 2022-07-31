<?php
  $con = new PDO('pgsql:host=localhost;dbname=CMPT354', 'ubuntu', 'password');
  $result;
  if(!$con){
    echo "Error : uanble to open database\n";
  }else{
  
    $Ticker = $_POST['Ticker'];
    $Company = $_POST['Company'];
    $Lei = $_POST['Lei'];
    
    try{
      $result = $con->query("INSERT INTO company(lei, comname)VALUES('$Lei', '$Company')");
    }catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }

    try{
      $result2 = $con->query("INSERT INTO stock(lei,ticker)VALUES( '$Lei', '$Ticker')");
    }catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
    
    }
    
    $con = null;
    if($result && $result2){
       header("location: /stock/insert_stock.php?status=success");
    }else if($result2){
      header("location: /stock/insert_stock?status=success");
    }
    else{
       header("location: /stock/insert_stock.php?status=fail");
    }
?>