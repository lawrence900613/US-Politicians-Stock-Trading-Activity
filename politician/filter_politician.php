<!DOCTYPE html>
<html lan="en">
<head>
    <link rel="stylesheet" href="/stylesheets/add.css">
    <title>Search Politician</title>
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
                            <th>Search by Name</th>
                        </tr>
                    </thead>
                    <form id = "rec-form" action="/politician/filter_result.php" method="post">
                        <tbody>
                            <tr>
                                <td><input type="text" name= "name" placeholder=" Name" class="Textbox" maxlength="20" required></td> 
                            </tr>
                        </tbody>
                    </form>   
                </table>
                <input type="submit" value="Submit" class="btn" form="rec-form">          
        </div>
    </div>
</body>
</html>
