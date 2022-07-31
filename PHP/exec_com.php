<?php
  $con = new PDO('pgsql:host=localhost;dbname=CMPT354', 'ubuntu', 'password');
  $result;
  if(!$con){
    echo "Error : uanble to open database\n";
  }else{
  
    $Exec_name = $_POST['Exec_name'];
    $DOB = pg_escape_string($_POST['DOB']);
    $LEI = $_POST['LEI'];
    $Salary = $_POST['Salary'];
    $Role= $_POST['Role'];
    $Company= $_POST['Company'];
    
    try{
      $result = $con->query("INSERT INTO company(lei, comname)VALUES('$LEI', '$Company')");

    }catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }

    try{
      $result2 = $con->query("INSERT INTO executiveof(execname, dob, lei, salary, role)VALUES('$Exec_name', '$DOB', '$LEI', '$Salary', '$Role')");

    }catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
    
    }
    $con = null;
    if($result && $result2){
       header("location: /stock/executive_company.php?status=success");
    }else if($result2){
      header("location: /stock/executive_company.php?status=success");
    }
    else{
       header("location: /stock/executive_company.php?status=fail");
    }
?>