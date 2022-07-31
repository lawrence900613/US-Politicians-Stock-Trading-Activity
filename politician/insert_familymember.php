<!DOCTYPE html>
<html lan="en">
<head>
    <link rel="stylesheet" href="/stylesheets/add.css">
    <title>Adding politician familymember</title>
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
                            <th>Member name</th>
                            <th>Member DOB</th>
                            <th>Relationship</th>
                            <th>Politician name</th>
                            <th>Politician DOB</th>
                        </tr>
                    </thead>
                    <form id = "rec-form" action="/PHP/insert_familymember.php" method="post">
                        <tbody>
                            <tr>
                                <td><input type="text" name= "Fmname" placeholder="Member name" class="Textbox" maxlength="20" required></td> 
                                <td><input type="date" name="FmDOB" placeholder="Member DOB" class="Textbox" maxlength="20" required></td>
                                <td><input type="text" name="Relationship" placeholder="Relationship" class="Textbox" maxlength="20" required></td>   
                                <td><input type="text" name="Polname" placeholder="Polname" class="Textbox" maxlength="20" required></td>  
                                <td><input type="date" name="PolDOB" placeholder="Poldob" class="Textbox" maxlength="20" required></td>
                            </tr>
                        </tbody>
                    </form>    
                </table>
        
                <?php
                if( $_GET['status']=='success'){
                  echo 'Data inserted successfully';
                }
                if( $_GET['status']=='fail'){
                  echo 'Data already exist';
                }
                if( $_GET['status']=='noPol'){
                  echo 'Data inserted fail, the input politcian is not in database. Pleasse add the politician first';
                }
                ?>
                <input type="submit" value="Submit" class="btn" form="rec-form">
        </div>
    </div>
</body>
</html>
