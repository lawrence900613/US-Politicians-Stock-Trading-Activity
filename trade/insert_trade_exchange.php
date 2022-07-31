<!DOCTYPE html>
<html lan="en">
<head>
    <link rel="stylesheet" href="/stylesheets/add.css">
    <title>Adding Exchange</title>
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
        
                <table class="AddTable" id="Table">
                    <thead>
                        <tr class="RowOne">
                            <th>Ticker</th>
                            <th>Ipo</th>
                            <th>Excname</th>
                            <th>Timezone</th>
                        </tr>
                    </thead>
                    <form id = "rec-form" action="/PHP/insert_trade_exchange.php" method="post">
                        <tbody>
                            <tr>
                                <td><input type="text" name="Ticker" placeholder="Ticker" class="Textbox" maxlength="20" required></td>  
                                <td><input type="date" name="Ipo" placeholder="Ipo" class="Textbox" maxlength="20" required></td>
                                <td><input type="text" name="Exchname" placeholder="Exchname" class="Textbox" maxlength="20" required></td>  
                                <td><input type="text" name="Timezone" placeholder="Timezone" class="Textbox" maxlength="20" required></td>
                            </tr>
                        </tbody>
                    </form>    
                </table>
        
                <?php
                if( $_GET['status']=='noTicker'){
                  echo 'data inserted fail, please add the stock information to database first';
                }
                if( $_GET['status']=='success'){
                  echo 'data inserted successfully';
                }
                if( $_GET['status']=='exist'){
                  echo 'data already exist in database';
                }
                ?>
                <input type="submit" value="Submit" class="btn" form="rec-form">
        </div>
    </div>
</body>
</html>