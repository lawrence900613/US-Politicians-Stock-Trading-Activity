<!DOCTYPE html>
<html lan="en">
<head>
    <link rel="stylesheet" href="/stylesheets/add.css">
    <title>Adding Transaction</title>
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
                            <th>Polname</th>
                            <th>DOB</th>
                            <th>Ticker</th>
                            <th>Action</th>
                            <th>Valfloor</th>
                            <th>Valceil</th>
                            <th>Time(UTC)</th> 
                        </tr>
                    </thead>
                    <form id = "rec-form" action="/PHP/insert_transaction.php" method="post">
                        <tbody>
                            <tr>
                                <td><input type="text" name= "Polname" placeholder=" Polname" class="Textbox" maxlength="20" required></td> 
                                <td><input type="date" name="DOB" placeholder="DOB" class="Textbox" maxlength="20" required></td>  
                                <td><input type="text" name="Ticker" placeholder="" class="Textbox" maxlength="20" required></td> 
                                <td><select name="Action">
                                    <option value="Buy">Buy</option>
                                    <option value="Sell">Sell</option>
                                </select></td>  
                                <td><input type="number" step="0.01" min="0" name="Valfloor" placeholder="valfloor" class="Textbox" maxlength="20" required></td>
                                <td><input type="number" step="0.01" min="0" name="Valceil" placeholder="valceil" class="Textbox" maxlength="20" required></td>
                                <td><input type="datetime-local" name="Time" maxlength="20" required></td>
                            </tr>
                        </tbody>
                    </form>    
                </table>
        
                <?php
                if( $_GET['status']=='success'){
                  echo 'data inserted successfully';
                }
                if( $_GET['status']=='fail'){
                  echo 'data inserted fail, please make sure the information of stock and politician already add in to database';
                }
                if( $_GET['status']=='valerror'){
                  echo 'data inserted fail, please make sure the valceil is larger than valfloor';
                }
                ?>
                <input type="submit" value="Submit" class="btn" form="rec-form">
        </div>
    </div>
</body>
</html>