<!DOCTYPE html>
<html lan="en">

<head>
    <link rel="stylesheet" href="/stylesheets/view.css">
    <title>Transaction</title>
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
        
        <h1>Transaction record database</h2>
        <div class="GreyBox">
            <h3><a href="./insert_transaction.php">Add transaction</a></h3>
            <p>Insert the transaction record, the politician and stock information must add before adding it</p>
            
            <h3><a href="./view_transaction.php">View transaction</a></h3>
            <p>View all existing transaction record</p>
            
            <h3><a href="./find_politician_transaction.php">Find politician in transaction</a></h3>
            <p>Find the information of politician who bought specific stock before</p>
            
            <h3><a href="./politician_stock_count.php">Count stock with politician </a></h3>
            <p>Count the number of times a politician bought a specific stock</p>
            
            <h3><a href="./transaction_avg_count.php">Average times of transaction </a></h3>
            <p>Find the average number of transaction per politician</p>
            
        </div>
    </div>
</body>


</html>