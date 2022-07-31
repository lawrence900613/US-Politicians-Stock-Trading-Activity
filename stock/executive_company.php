<!DOCTYPE html>
<html lan="en">
<head>
    <link rel="stylesheet" href="/stylesheets/add.css">
    <title>Add Executive Company</title>
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
                            <th>Executive Name</th>
                            <th>DOB</th>
                            <th>LEI</th>
                            <th>Salary (INT)</th>
                            <th>Role</th>
                            <th>Company Name</th>
                        </tr>
                    </thead>
                    <form id = "rec-form" action="/PHP/exec_com.php" method="post">
                        <tbody>
                            <tr>
                                <td><input type="text" name= "Exec_name" placeholder="Name" class="Textbox" maxlength="20" required></td> 
                                <td><input type="date" name="DOB" placeholder="DOB" class="Textbox" maxlength="20" required></td>  
                                <td><input type="text" name="LEI" placeholder="LEI" class="Textbox" maxlength="20" required></td>  
                                <td><input type="text" name="Salary" placeholder="Salary" class="Textbox" maxlength="20" required></td>
                                <td><input type="text" name="Role" placeholder="Role" class="Textbox" maxlength="20" required></td>
                                <td><input type="text" name="Company" placeholder="Company" class="Textbox" maxlength="20" required></td>
                            </tr>
                        </tbody>
                    </form>    
                </table>
        
                <?php
                if( $_GET['status']=='success'){
                  echo 'data inserted successfully';
                }
                if( $_GET['status']=='false'){
                  echo 'data inserted fail';
                }
                ?>
                <input type="submit" value="Submit" class="btn" form="rec-form">
        </div>
    </div>
</body>
</html>