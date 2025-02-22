<?php
    include("connection.php");
    $queryCreateUserRegistrationTable="CREATE TABLE userregistration(
        id int(10),
        name VARCHAR(220),
        phNumber VARCHAR(10),
        password VARCHAR(220)
    );";
    $ExecuteQueryCreateUserRegistrationTable=mysqli_query($conn,$queryCreateUserRegistrationTable);
?>