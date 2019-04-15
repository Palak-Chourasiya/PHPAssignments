<html>
<?php
extract ( $_POST );
?>
<head>
	<title>Project Details</title>
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


$query = "INSERT INTO Project (ProjectIDNumber, ProjectName, ProjectDueDate, SupervisorID) 
VALUES ('$ProjectID','$ProjectName','$ProjectDueDate','$supervisorID')";
            
            
if ( !( $result = $database->query ( $query ) ) ) {
			die ( "Could not execute query! " . $database->connect_error );
			}
			else{
				echo "Record added!";
			}

?>
<a href="http://palak123.psjconsulting.com/index.php"> Click here to go back</a>
</body>

</html>