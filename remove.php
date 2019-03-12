<?php
 
$server="127.0.0.1";
$username="root";
$password="goldtree9";
$db="todo_database";

$conn= new mysqli($server,$username,$password,$db);
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
$query = "DELETE FROM `todo_table`";
if(mysqli_query($conn,$query)){
        }
        else{
            echo"ERROR";
        }
?>
