<!DOCTYPE html>
<html lan="en">

<head>
    <link rel="stylesheet" href="/stylesheets/view.css">
    <title>Bill</title>
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

        <h1>Bill database</h2>
        <div class="GreyBox">
            <h3><a href="./insert_bill.php">Add bill</a></h3>
            <p>Add bill information</p>
            
            <h3><a href="./view_bill.php">View bill</a></h3>
            <p>View all existing bill information</p>
            
            <h3><a href="./insert_billvote.php">Add billvote</a></h3>
            <p>Add the billvote inforamtion for each politician</p>
            
            <h3><a href="./view_billvote.php">View all billvote</a></h3>
            <p>View the existing billvote inforamtion for each politician</p>
            
            <h3><a href="./filter_billvote_politician.php">Search politician_billvote</a></h3>
            <p>Seach for the information of politician who vote the specific bill</p>
            
            <h3><a href="./politician_vote_all_bill.php">Politician vote all bill</a></h3>
            <p>Seach for the information of politician who vote all the bill in database</p>
            
        </div>
    </div>
</body>


</html>