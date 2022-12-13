
<?php
//Author: Kamal Patel, 000863596 
//Date : 20-November 2022
//database connectivity

try{
    $dbh=new PDO(
        "mysql:host=localhost;dbname=sa000863596",
        "root",
        ""
    );
}catch(Exception $e){
    die("ERROR: Couldn't connect. {$e->getMessage()}");
}
?>