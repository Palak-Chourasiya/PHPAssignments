<html>
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
$id = $name = $date = $supID ="";
$iderr =$nameerr =$dateerr = $supIDerr ="";

if(empty($_POST['ProjectID'])){
	$iderr="Enter Project ID";
}else{
	$id=$_POST['ProjectID'];
}

if(empty($_POST['ProjectName'])){
	$nameerr="Enter Project Name";
}else{
	$name=$_POST['ProjectName'];
}

if(empty($_POST['ProjectDueDate'])){
	$dateerr="Enter Project Due Date";
}else{
	$date=$_POST['ProjectDueDate'];
}

if(empty($_POST['supervisorID'])){
	$supIDerr="Enter Project Supervisor ID";
}else{
	$supID=$_POST['supervisorID'];
}

if(empty($iderr) && empty($nameerr) && empty($dateerr) && empty($supIDerr)){

$sql = "INSERT INTO Project (ProjectIDNumber, ProjectName, ProjectDueDate, SupervisorID) VALUES (?,?, ?,?)";

 if($stmt = $database->prepare($sql)){
           
            $stmt->bind_param("sss", $param_ID, $param_name, $param_date, $param_supID);
            
            $param_ID = $id;
            $param_name=$name;
            $param_date=$date;
            $param_supID =$supID;
            
            
            if($stmt->execute()){
                // Records created successfully. Redirect to landing page
                header("location: ../index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }

        }
         $stmt->close();
    
}
 $database->close();

?>
<a href="http://palak123.psjconsulting.com/index.php"> Click here to validate</a>
</body>

</html>