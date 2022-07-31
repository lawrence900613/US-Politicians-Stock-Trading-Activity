<?php
    $myPDO = new PDO('pgsql:host=localhost;dbname=CMPT354', 'ubuntu', 'password');
    $result = $myPDO->query("SELECT * FROM transaction");
    if(!$myPDO) {
      echo 'there has been an error connecting';
    } 
?>
<!DOCTYPE html>
<html lan="en">

<head>
    <link rel="stylesheet" href="/stylesheets/view.css">
    <title>View Transaction</title>
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
                            <th>Polname</th>
                            <th>DOB</th>
                            <th>Ticker</th>
                            <th>Action</th>
                            <th>Valfloor</th>
                            <th>ValCeil</th>
                            <th>Time</th>
                    </tr>
                </thead>
                
                <?php
                    while ($row = $result->fetch()){
                ?>
                <tr>
                      <td><?php echo $row['polname']; ?></td>
                      <td><?php echo $row['dob']; ?></td>
                      <td><?php echo $row['ticker']; ?></td>
                      <td><?php echo $row['action']; ?></td>
                      <td><?php echo $row['valfloor']; ?></td>
                      <td><?php echo $row['valceil']; ?></td>
                      <td><?php echo $row['time']; ?></td>
                </tr>
                
                <?php
                    }
                  ?>
                  
            </table>
        </div>
    </div>
</body>


</html>