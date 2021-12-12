<?php 
require('authenticate.php');
require('dbconnector.php');

require('admin_menu.php');

?>

  
   <div class="jumbotron">
    
     <div class="container">
     <div class="row">
         <div class="col-md-8">
            <h1 class="display-3">Current employees</h1>
          </div>
     </div>
    

          <hr class="my-4">            
               
		
               <table class="table">
          <tr>
              
                <th scope="col">Employee ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">SSN</th>
                <th scope="col">Street</th>
                <th scope="col">City</th>
                <th scope="col">State</th>                
                <th scope="col">Zipcode</th>
                <th scope="col">Phone number</th>
                <th scope="col">Email</th>
                <th scope="col">Username</th>
				<th scope="col">DOB</th>
          </tr>
         
              <?php

        $sql = "SELECT * FROM employees ORDER BY last_name ASC";
        $result = $connection->query($sql);
        if($result->num_rows>0)
        {
            while($row=$result -> fetch_assoc())
            {
               echo "<tr><td>". $row['employee_ID']."</td>\n";
               echo "<td>". $row['first_name']."</td>\n";
               echo "<td>". $row['last_name']."</td>\n";
               echo "<td>". $row['SSN']."</td>\n";
               echo "<td>". $row['street']."</td>\n";
               echo "<td>". $row['city']."</td>\n";
               echo "<td>". $row['state']."</td>\n";
               echo "<td>". $row['zip_code']."</td>\n";
               echo "<td>". $row['phone_number']."</td>\n";
               echo "<td>". $row['email']."</td>\n";
                echo "<td>". $row['username']."</td>\n"; 
               echo "<td>". $row['DOB']."</td>\n";     
                 echo "<td><a href='addEmployee.php?empID=". $row['employee_ID']."'>EDIT</a></td>";
                if($userid!=$row['employee_ID']){
               echo "<td><a  onclick=\"return confirm('Do you really want to delete this employee?')\" href='deleteEmployee.php?empID=". $row['employee_ID']."'>DELETE</a></td>\n";}
                    echo "</tr>";
            }
        }
        else{
            echo "No Results";
        }
        $connection->close();
        ?>
          </tr>
          
      </table>
      
       <div class="row">
         <div class="col-md-8">
             <h5><a href="addEmployee.php">Add a new employee</a></h5>
          </div>
          
           <?php
     if (isset($_GET['result'])){
         
         if ($_GET['result']=='insertSuccess'){
             echo "<div class='col-md-8' style='color: green'>
             Employee was successfully added !
          </div>";
         }
         else if ($_GET['result']=='insertFailed'){
             echo "<div class='col-md-8' style='color: red'>
             Unable to add! Person already exists!
          </div>";
         }
         
         else if ($_GET['result']=='deleteSuccess'){
             echo "<div class='col-md-4' style='color: teal'>
             Employee was successfully removed!
          </div>";
         
         }
         else if ($_GET['result']=='deleteFailed'){
             echo "<div class='col-md-4' style='color: red'>
             Unable to delete! Employee does not exist!
          </div>";
         
         }
         else if ($_GET['result']=='editSuccess'){
             echo "<div class='col-md-4' style='color: blue'>
             Employee succesfully updated!
          </div>";
         
         }
         
     }

?>
       
        </div>
      </div>
       
        </div>
      </div>

<?php
    require('admin_footer.php');

?>



		
        
       