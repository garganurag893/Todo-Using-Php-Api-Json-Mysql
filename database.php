<?php
 
$server="127.0.0.1";
$username="root";
$password="goldtree9";
$db="todo_database";

$conn= new mysqli($server,$username,$password,$db);
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
    
}


$query = "Select * from todo_table";
$result=mysqli_query($conn,$query);

        function getalldata($result)
        {
            if(mysqli_num_rows($result)>0)
            {
                $arr = array();
                while($row=mysqli_fetch_assoc($result))
                {
                    array_push($arr, array('Id' => $row["Id"], 'Task_Name' => $row["Task_Name"], 'status' => $row["status"]));
                }
            }
            return json_encode($arr);
        }


        if ($_SERVER["REQUEST_METHOD"] == "GET") 
        {
            echo getalldata($result);
	    }
?>