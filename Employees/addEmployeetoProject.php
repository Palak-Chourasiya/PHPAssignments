<html>
<head>
	<title>Employee Details</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="..\css\myStyles.css">
</head>

<body>	

	<?php
extract ( $_POST );
?>
	<p>Employees can be added to projects here:</p>
	<a href="http://palak123.psjconsulting.com/index.php"> Click here to validate</a>
	<?php
		
		$database = new mysqli("localhost", "palak123", "palak12384", "palak123");
	    // Check connection
       if ($database->connect_error) {
        die("Connection failed: " . $database->connect_error);
      }
	   
$sql="INSERT INTO `EmployeeProjectDetails`(`ProjectIDNumber`, `EmployeeID`, `TaskInProject`, `DepartmentID`) VALUES ('$PID','$EID','$task','$DID')";

$result=$database->query($sql);

if(!($result)){
	echo "Couldn't execute query";

}else
{
	echo "Employee ".$EmployeeID." added successfully to project ".$ProjectIDNumber;
}


	   ?>
<a href="http://palak123.psjconsulting.com/index.php"> Click here to go back</a>


</body>

</html>