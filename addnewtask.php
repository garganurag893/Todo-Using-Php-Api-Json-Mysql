<?php
 
$server="127.0.0.1";
$username="root";
$password="goldtree9";
$db="todo_database";

$conn= new mysqli($server,$username,$password,$db);
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
function Validate($formData){
        $formData=trim(stripslashes(htmlspecialchars($formData)));
        return $formData;
    }

if($_POST["task"])
{
        $finaltask=Validate($_POST["task"]);
        $insert_query = "INSERT INTO `todo_table` (`Id`, `Task_Name`, `status`) VALUES (NULL, '$finaltask',0);";
        if(mysqli_query($conn,$insert_query)){
        }
        else{
            echo"ERROR";
        }
}
?>