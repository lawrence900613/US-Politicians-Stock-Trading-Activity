<?php
  $con = new PDO('pgsql:host=localhost;dbname=CMPT354', 'ubuntu', 'password');
  $result;
  $count;
  if(!$con){
    echo "Error : uanble to open database\n";
  }else{
    $Ticker = $_POST['Ticker'];
    try{
        $result = $con->query("SELECT DISTINCT politicianrepresent.polname,politicianrepresent.dob,politicianrepresent.party,politicianrepresent.role,politicianrepresent.statename FROM politicianrepresent JOIN transaction on politicianrepresent.polname = transaction.polname AND politicianrepresent.dob = transaction.dob WHERE transaction.ticker = '$Ticker'");
    }catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
  }
    $con = null;
?>


<!DOCTYPE html>
<html lan="en">

<head>
    <link rel="stylesheet" href="/stylesheets/view.css">
    <title>Result</title>
</head>

<body>
    <div class="WhiteBox">

        <table id="links" class="Links">
            <thead>
                <tr>
                   <th><a href="/index.html">Home</a></th>
                    <th><a href="/politician/politician.php">Politician</a></th>
                    <th><a href="/bill/bill.php">Bill</a></th>
                    <th><a href="/stock/stock.php">Stock </a></th>
                    <th><a href="/transaction/transaction.php">Transaction </a></th>
                    <th><a href="/state/state.php">State</a></th>
                    <th><a href="/trade/trade_exchange.php">Trade_exchange</a></th>
                </tr>
            </thead>
        </table>

        <div class="GreyBox">

            <table class="TableFormat" id="Table">
                <thead>
                    <tr class="RowOne">
                            <th>Name</th>
                            <th>DOB</th>
                            <th>Role</th>
                            <th>Party</th>
                            <th>Statename</th>
                    </tr>
                </thead>
                
                <?php
                    while ($row = $result->fetch()){
                ?>
                <tr>
                    <td><?php echo $row['polname']; ?></td>
                    <td><?php echo $row['dob']; ?></td>
                    <td><?php echo $row['role']; ?></td>
                    <td><?php echo $row['party']; ?></td>
                    <td><?php echo $row['statename']; ?></td>
                </tr>
                
                <?php
                    }
                  ?>
                  
            </table>
        </div>
    </div>
</body>


</html>