<?php
  $con = new PDO('pgsql:host=localhost;dbname=CMPT354', 'ubuntu', 'password');
  $result;
  $result2;
  $result_count_ticker;
  $count;
  if(!$con){
    echo "Error : uanble to open database\n";
  }else{
  
    $Ticker = $_POST['Ticker'];
    $Ipo = pg_escape_string($_POST['Ipo']);
    $Exchname = $_POST['Exchname'];
    $Timezone = $_POST['Timezone'];
    
    
    try{
      $result_count_ticker = $con->query("SELECT count(*) FROM stock WHERE ticker ='$Ticker'");
      $count = $result_count_ticker->fetch();
    }catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
    
    if(!$count['count']){
      header("location: /trade/insert_trade_exchange.php?status=noTicker");
    }else{
      try{
        $result = $con->query("INSERT INTO exchange(exchname, timezone)VALUES('$Exchname', '$Timezone')");
      }catch (Exception $e) {
          echo 'Caught exception: ',  $e->getMessage(), "\n";
      }
  
      try{
        $result2 = $con->query("INSERT INTO tradedexchange(ticker, ipo, exchname)VALUES('$Ticker', '$Ipo', '$Exchname')");
      }catch (Exception $e) {
          echo 'Caught exception: ',  $e->getMessage(), "\n";
      }
    }
    
    }
    $con = null;
    
    if(!$count['count']){
      header("location: /trade/insert_trade_exchange.php?status=noTicker");
    }else if($result && $result2){
       header("location: /trade/insert_trade_exchange.php?status=success");
    }else if($result2){
      header("location: /trade/insert_trade_exchange.php?status=success");
    }
    else{
       header("location: /trade/insert_trade_exchange.php?status=exist");
    }
?>