<!doctype html>
<html>
<head>
	<title>IT Professional Company</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="\css\myStyles.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>
<?php
		
		$database = new mysqli("localhost", "palak123", "palak12384", "palak123");
	    // Check connection
       if ($database->connect_error) {
        die("Connection failed: " . $database->connect_error);
      }
	   ?>

<div class="container-fluid">
<h4>This Page Provides a Menu for different actions that can be performed on this site</h4>
</div>
<nav>
<ul>
<li>View Projects</li>
<li>Add Projects</li>
<li>View Employees</li>
<li>Add Employees to Projects</li>
<li>Edit Employee Details</li>
</ul>
</nav>
<div >
 <a href="\Projects\projects.html">New projects can be added by clicking here</a> 
 </div>
<div>
<a  href="\Employees\employees.html">New employees can be added by clicking here</a> 
</div>
<div>
<a  href="http://palak123.psjconsulting.com/Employees/employeesProject.php">Employees can be added to projects by clicking here</a> 
</div>
 <table border = "2" cellpadding = "3" cellspacing = "2" style = "background-color: ADD8E6" padding="50px">
	   <tr>
	   	<th>Employee Details can be Viewed here</th>
	   </tr>
	   <tr>
	   	<td>Project ID Number</td>
		 <td>Employee ID</td>	
		 <td>First Name</td>
		 <td>Last Name</td>	
		<td>Title</td>
		<td>Task In Project</td>
		<td>Department ID</td>
		<td>Action</td>
	    </tr>
<?php
		$url="";
		$sql = "SELECT EmployeeProjectDetails.ProjectIDNumber, EmployeeDetails.EmployeeID, 
				EmployeeDetails.FirstName, EmployeeDetails.LastName, EmployeeDetails.Title, EmployeeProjectDetails.TaskInProject, EmployeeProjectDetails.DepartmentID
				FROM EmployeeProjectDetails
				JOIN EmployeeDetails ON ( EmployeeDetails.EmployeeID = EmployeeProjectDetails.EmployeeID ) 
				WHERE 1";

			if (! ($result = $database->query($sql) ) ) {
				echo ("Could not execute query! <br>");
				die("Terminating");
			}
			while($row = $result->fetch_array()) {

										echo "<tr>";
										echo "<td>" . $row['ProjectIDNumber'] . "</td>";
										echo "<td>" . $row['EmployeeID'] . "</td>";
										echo "<td>" . $row['FirstName'] . "</td>";
										echo "<td>" . $row['LastName'] . "</td>";
                                        echo "<td>" . $row['Title'] . "</td>";
                                        echo "<td>" . $row['TaskInProject'] . "</td>";
                                        echo "<td>" . $row['DepartmentID'] . "</td>";
                         				$url= "update.php?EmployeeID=". $row['EmployeeID']."&ProjectIDNumber=".$row['ProjectIDNumber'];
										echo "<td>";
										echo "<a href=".$url.">Update Record</a>";
										echo "</td>";
                                        echo "</tr>";
										
			}
    $database->close(); 
?>
</div>

</body>
</html>