<?php
    $myPDO = new PDO('pgsql:host=localhost;dbname=CMPT354', 'ubuntu', 'password');
    $result = $myPDO->query("SELECT familymemberdetails.fmname, familymemberdetails.fm_dob, familymemberrelationship.polname, familymemberrelationship.poldob, familymemberdetails.relationship FROM familymemberdetails JOIN familymemberrelationship on familymemberdetails.fmname = familymemberrelationship.fmname AND familymemberdetails.polname = familymemberrelationship.polname");
    if(!$myPDO) {
      echo 'there has been an error connecting';
    } 
?>
<!DOCTYPE html>
<html lan="en">

<head>
    <link rel="stylesheet" href="/stylesheets/view.css">
    <title>View familymember</title>
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
                            <th>Member name</th>
                            <th>Member DOB</th>
                            <th>Relationship</th>
                            <th>Polname</th>
                            <th>Polname DOB</th>
                    </tr>
                </thead>
                
                <?php
                    while ($row = $result->fetch()){
                ?>
                <tr>
                    <td><?php echo $row['fmname']; ?></td>
                    <td><?php echo $row['fm_dob']; ?></td>
                    <th><?php echo $row['relationship']; ?></th>
                    <td><?php echo $row['polname']; ?></td>
                    <td><?php echo $row['poldob']; ?></td>
                </tr>
                
                <?php
                    }
                  ?>
                  
            </table>
        </div>
    </div>
</body>


</html>