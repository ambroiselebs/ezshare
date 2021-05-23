<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Make MySQLi throw exceptions.

try {
    $conn = mysqli_connect("localhost", "root", "", "ezshare");
} catch (mysqli_sql_exception $e) { 
    echo "MySQLi Error Code: " . $e->getCode() . "<br />";
    echo "Exception Msg: " . $e->getMessage();
    exit; // exit and close connection.
}

?>