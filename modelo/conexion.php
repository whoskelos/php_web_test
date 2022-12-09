<?php
function conectaDB(){
    try {
        $dsn = "mysql:host=localhost;dbname=crud_php";
        $dbh = new PDO($dsn,"root","");
        $dbh->exec("SET CHARACTER SET UTF8");
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbh;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
?>