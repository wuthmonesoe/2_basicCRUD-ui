<?php

require_once "./core/connection.php";
require_once "./core/functions.php";

if($_SERVER["REQUEST_METHOD"] === "GET"){
    $id = $_GET ["id"];
    $sql = "DELETE FROM my WHERE id = $id";
    if(mysqli_query($conn,$sql)){
        header("LOCATION:list-index.php");
    }
}