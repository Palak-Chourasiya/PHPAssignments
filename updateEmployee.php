<?php
       
        $ED=$_GET['EmployeeID'];
       $PD=$_GET['ProjectIDNumber'];

       extract($_POST);

       

    $database = new mysqli("localhost", "palak123", "palak12384", "palak123");
        // Check connection
       if ($database->connect_error) {
        die("Connection failed: " . $database->connect_error);
      }

      $sql = "UPDATE EmployeeProjectDetails JOIN EmployeeDetails ON (EmployeeDetails.EmployeeID=EmployeeProjectDetails.EmployeeID)
              SET 
              EmployeeDetails.FirstName='$FirstName',
                EmployeeDetails.LastName='$LastName', 
                  EmployeeDetails.Title='$Title',
                    EmployeeProjectDetails.TaskInProject='$task',
                      EmployeeProjectDetails.DepartmentID='$DID'
                    WHERE EmployeeDetails.EmployeeID='$ED' AND  EmployeeProjectDetails.ProjectIDNumber='$PD' ";


        $result="";
        $result=$database->query($sql);
      

        if(!($result)){
            echo "Couldn't Execute query";
        }else {
            echo "Record Updated";
            echo "<a href="."http://palak123.psjconsulting.com/index.php"."> To Go Back</a>";
        }

          $database->close(); 

?>