<?php
session_start();
require_once "./core/connection.php";
require_once "./core/functions.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $id = $_POST ["id"];
    $sql = "DELETE FROM my WHERE id = $id";
    $_SESSION['status'] = [
             'message' => "List Deleted"
    ];
       
            
    if(mysqli_query($conn,$sql)){
        header("LOCATION:list-index.php");
    }
}