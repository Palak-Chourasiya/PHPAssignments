<html>
<head>
	<title>Employee Details</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="..\css\myStyles.css">
</head>

<body>	
	<?php
		
		$database = new mysqli("localhost", "palak123", "palak12384", "palak123");
	    // Check connection
       if ($database->connect_error) {
        die("Connection failed: " . $database->connect_error);
      }
	   ?>
<div>
<p>Employees can be added to projects here:</p>
<form method="post" action="http://palak123.psjconsulting.com/Employees/addEmployeetoProject.php">
Enter Project ID present in the table:	
<input type="text" name="PID"> <br>
Enter Employee ID present in the table:
<input type="text" name="EID"><br>
Enter Task in the Project:
<input type="text" name="task"><br>
Enter Department ID (1 or 2)
<input type="text" name="DID"><br>
<input type="Submit" name="submit">
</form>
</div>
<div>
<table border = "1" cellpadding = "3" cellspacing = "2" style = "background-color: ADD8E6" padding="50px">
	  <tr>
	   	<th>Currently on-going projects</th>
	   </tr>
	   <tr>
		 <td>Project ID</td>
		 <td>Project Name</td>	
	    </tr>
</div>
<div>
<?php
		$sql = "SELECT Project.ProjectIDNumber, Project.ProjectName FROM Project";
		    // query database
			if (! ($result = $database->query($sql) ) ) {
				echo ("Could not execute query! <br>");
				die("Terminating");
			}
			for ( $counter = 0; $row = $result->fetch_row(); $counter++) {
				echo( "<tr>");
				foreach ( $row as $value)
					echo ( "<td>$value</td>");
				echo("</tr>");
			}
			?>

 </div>

<div>

	 <table border = "2" cellpadding = "3" cellspacing = "2" style = "background-color: ADD8E6" padding="50px">
	   <tr>
	   	<th>Employee Details</th>
	   </tr>
	   <tr>
		 <td>First Name</td>
		 <td>Last Name</td>	
		<td>Title</td>
		<td>ID</td>
	    </tr>
<?php
		$sql = "SELECT * FROM EmployeeDetails";
			if (! ($result = $database->query($sql) ) ) {
				echo ("Could not execute query! <br>");
				die("Terminating");
			}
			for ( $counter = 0; $row = $result->fetch_row(); $counter++) {
				echo( "<tr>");
				foreach ( $row as $value)
					echo ( "<td>$value</td>");
				echo("</tr>");
			}
    $database->close(); 
?>


</div>


</body>

</html>