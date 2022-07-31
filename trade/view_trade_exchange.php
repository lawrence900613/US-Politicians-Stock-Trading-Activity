<?php
    $myPDO = new PDO('pgsql:host=localhost;dbname=CMPT354', 'ubuntu', 'password');
    try{
        $result = $myPDO->query("SELECT tradedexchange.ticker, tradedexchange.exchname, tradedexchange.ipo, exchange.timezone FROM tradedexchange JOIN exchange on tradedexchange.exchname = exchange.exchname");
  
      }catch (Exception $e) {
          echo 'Caught exception: ',  $e->getMessage(), "\n";
      }
?>
<!DOCTYPE html>
<html lan="en">

<head>
    <link rel="stylesheet" href="/stylesheets/view.css">
    <title>View Stock Exchange</title>
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
                            <th>Ticker</th>
                            <th>Ipo</th>
                            <th>Exchname</th>
                            <th>Timezone</th>
                    </tr>
                </thead>
                
                <?php
                    while ($row = $result->fetch()){
                ?>
                <tr>
                    <td><?php echo $row['ticker']; ?></td>
                    <td><?php echo $row['ipo']; ?></td>
                    <td><?php echo $row['exchname']; ?></td>
                    <td><?php echo $row['timezone']; ?></td>
                </tr>
                
                <?php
                    }
                  ?>
                  
            </table>
        </div>
    </div>
</body>


</html>