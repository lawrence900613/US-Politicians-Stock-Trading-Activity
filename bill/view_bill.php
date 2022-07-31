<?php
    $myPDO = new PDO('pgsql:host=localhost;dbname=CMPT354', 'ubuntu', 'password');
    $result = $myPDO->query("SELECT * FROM billprivate");
    $result2 = $myPDO->query("SELECT * FROM billpublic");
    if(!$myPDO) {
      echo 'there has been an error connecting';
    } 
?>
<!DOCTYPE html>
<html lan="en">

<head>
    <link rel="stylesheet" href="/stylesheets/view.css">
    <title>View Bill</title>
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
                            <th>ID</th>
                            <th>Year</th>
                            <th>Status</th>
                            <th>Type</th>
                            <th>Beneficiary</th>
                    </tr>
                </thead>
                
                <?php
                    while ($row = $result->fetch()){
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['year']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td>Private</td>
                    <td><?php echo $row['beneficiary']; ?></td>
                </tr>
                
                <?php
                    }
                  ?>
                  
                <?php
                    while ($row = $result2->fetch()){
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['year']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td>Public</td>
                    <td><?php echo $row['beneficiary']; ?></td>
                </tr>
                
                <?php
                    }
                  ?>
                  
            </table>
        </div>
    </div>
</body>


</html>