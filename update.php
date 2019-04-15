<?php
       $PID=$_GET['ProjectIDNumber'];
       $EID=$_GET['EmployeeID'];
        $ProjectID="";
        $EmployeeID="";
        $Fname="";
        $Lname="";
        $Title="";
        $Task="";
        $DepID="";
        $url= "http://palak123.psjconsulting.com/updateEmployee.php?EmployeeID=". $EID."&ProjectIDNumber=".$PID;

    $database = new mysqli("localhost", "palak123", "palak12384", "palak123");
        // Check connection
       if ($database->connect_error) {
        die("Connection failed: " . $database->connect_error);
      }

      $sql = "SELECT EmployeeProjectDetails.ProjectIDNumber, EmployeeDetails.EmployeeID ,EmployeeDetails.FirstName, EmployeeDetails.LastName, EmployeeDetails.Title, EmployeeProjectDetails.TaskInProject, EmployeeProjectDetails.DepartmentID FROM EmployeeProjectDetails JOIN EmployeeDetails ON (EmployeeDetails.EmployeeID=EmployeeProjectDetails.EmployeeID) WHERE EmployeeDetails.EmployeeID='$EID' AND  EmployeeProjectDetails.ProjectIDNumber='$PID'";


        $result="";
        $result=$database->query($sql);
      

        if(!($result)){
            echo "Couldn't Execute query";
        }
        if (count($result) == 1 ) {
            $row = mysqli_fetch_array($result);
            $Fname=$row['FirstName'];
            $Lname=$row['LastName'];
            $Title=$row['Title'];
            $Task=$row['TaskInProject'];
            $DepID=$row['DepartmentID']; 
        }

       
          $database->close(); 

?>


<!doctype html>
<html>
<head>
    <title>IT Professional Company</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="\css\myStyles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
                    <h2>Update Record</h2>
                    <p>Please edit the Employee Details and submit to update the employee record.</p>
                        <form method="post" action="<?php echo "http://palak123.psjconsulting.com/updateEmployee.php?EmployeeID=".$EID."&ProjectIDNumber=".$PID; ?>">
                        <label for="Employee First Name">First name:</label> 
                        <input type="text" name="FirstName" id="FirstName" value="<?php echo $Fname; ?>"><br>
                        <label for="Last Name">Last Name:</label>
                        <input type="text" name="LastName" id= "LastName" value="<?php echo $Lname;?>" ><br>
                        <label for="Title">Title </label>
                        <input type="text" name="Title" id="Title" value="<?php echo $Title; ?>"><br>
                        <label for="Task">Task:</label> 
                         <input type="text" name="task" id="task" value="<?php echo $Task; ?>"><br>
                        <label for="Department ID">Department ID</label>
                        <input type="text" name="DID" id= "DID" value="<?php echo $DepID; ?>" ><br>                    
                        <input type="submit" value="Submit">
                        <a href="http://palak123.psjconsulting.com/index.php">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>


