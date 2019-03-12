<!DOCTYPE html>
<html>
<head>
	<title>Todo List</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,700,500' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.css">
	<script type="text/javascript" src="js/lib/jquery-2.1.4.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div id="container">
    <div id="newentry" class="text-center">
        <h1>To-Do List <i class="fa fa-plus"></i></h1>
        <input id="taska" class="text-center"name='task' placeholder="Add New Todo">
        <br>
        <button id="addbtn" name="add" class="btn btn-outline-primary">Add new task</button>
        <br><br>
    </div>
    <ul id="ul">
    </ul>
    <div class='text-center'>
    <button id="emptylist" style="margin-bottom:20px;"class="btn btn-outline-primary bt-large">Empty List</button>
    </div>
</div>
<script type="text/javascript" src="js/app.js">
</script>
</body>
</html>