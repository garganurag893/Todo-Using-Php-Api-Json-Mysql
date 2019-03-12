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
$method = $_SERVER['REQUEST_METHOD'];
	switch($method) {
		case 'GET':
		    $deltask=Validate($_GET["taskdel"]);
            $update_query = "UPDATE `todo_table` SET `status`= '1' WHERE `Id`='$deltask';";
            if(mysqli_query($conn,$update_query)){
            }
            else{
                echo"ERROR";
            }
		break;

		case "PUT":
			parse_str(file_get_contents("php://input"),$_PUT);
            $deltask=Validate($_PUT["taskdel"]);
            $delete_query = "DELETE FROM `todo_table` WHERE `Id` = '$deltask';";
            if(mysqli_query($conn,$delete_query)){
            }
            else{
                echo"ERROR";
            }
            break;

	  	case 'DELETE':
	  		//echo "in del";
	  		parse_str(file_get_contents("php://input"),$_DELETE);
			$deltask=Validate($_DELETE["taskdel"]);
            $update_query = "UPDATE `todo_table` SET `status`= '0' WHERE `Id`='$deltask';";
            if(mysqli_query($conn,$update_query)){
            }
            else{
                echo"ERROR";
            }
	  	break;

	  

	  default:
	    
	   break;
	}
?>