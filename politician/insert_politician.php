<!DOCTYPE html>
<html lan="en">
<head>
    <link rel="stylesheet" href="/stylesheets/add.css">
    <title>Adding Politician</title>
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
                            <th>Name</th>
                            <th>DOB</th>
                            <th>Role</th>
                            <th>Party</th>
                            <th>StateName</th>
                        </tr>
                    </thead>
                    <form id = "rec-form" action="/PHP/insert_pol.php" method="post">
                        <tbody>
                            <tr>
                                <td><input type="text" name= "name" placeholder=" Name" class="Textbox" maxlength="20" required></td> 
                                <td><input type="date" name="DOB" placeholder="DOB" class="Textbox" maxlength="20" required></td>  
                                <td><input type="text" name="Role" placeholder="Role" class="Textbox" maxlength="20" required></td>  
                                <td><input type="text" name="Party" placeholder="Party" class="Textbox" maxlength="20" required></td>
                                <td><input type="text" name="State" placeholder="State" class="Textbox" maxlength="20" required></td>
                            </tr>
                        </tbody>
                    </form>    
                </table>
        
                <?php
                if( $_GET['status']=='success'){
                  echo 'data inserted successfully';
                }
                if( $_GET['status']=='fail'){
                  echo 'data inserted fail';
                }
                ?>
                <input type="submit" value="Submit" class="btn" form="rec-form">
        </div>
    </div>
</body>
</html>
