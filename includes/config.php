<?php
    ob_start(); // Turns on output buffering
    session_start();
    
    date_default_timezone_set("America/Sao_Paulo");

    try {
        $con= new PDO("mysql:dbname=sciencine;host=localhost", "root", "");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    } catch(PDOException $e) {
        exit("Connection Failed: " . $e->getMessage());
    }
?>