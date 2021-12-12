<?php 
require('authenticate.php');
require('dbconnector.php');

require('admin_menu.php');

?>

  
   <div class="jumbotron">
    
     <div class="container">
     <div class="row">
         <div class="col-md-8">
            <h1 class="display-3">Current customers</h1>
          </div>
          
        
     </div>
    

          <hr class="my-4">
              
               <table class="table">
          <tr>
		
               <table class="table">
          <tr>
              
                <th scope="col">Customer ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>                
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

        $sql = "SELECT * FROM customers ORDER BY customer_last_name ASC";
        $result = $connection->query($sql);
        if($result->num_rows>0)
        {
            while($row=$result -> fetch_assoc())
            {
               echo "<tr><td>". $row['customer_ID']."</td>\n";
               echo "<td>". $row['customer_first_name']."</td>\n";
               echo "<td>". $row['customer_last_name']."</td>\n";               
               echo "<td>". $row['customer_street']."</td>\n";
               echo "<td>". $row['customer_city']."</td>\n";
               echo "<td>". $row['customer_state']."</td>\n";
               echo "<td>". $row['customer_zip_code']."</td>\n";
               echo "<td>". $row['customer_phone_number']."</td>\n";
               echo "<td>". $row['customer_email']."</td>\n";
                echo "<td>". $row['customer_username']."</td>\n"; 
               echo "<td>". $row['customer_DOB']."</td>\n";   
                echo "<td><a href='addCustomer.php?customerID=". $row['customer_ID']."'>EDIT</a></td>";
               
               echo "<td><a  onclick=\"return confirm('Do you really want to delete this customer?')\" href='deleteCustomer.php?customerID=". $row['customer_ID']."'>DELETE</a></td>\n";
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
             <h5><a href="addCustomer.php">Add a new customer</a></h5>
          </div>
          
          <?php
     if (isset($_GET['result'])){
         
         if ($_GET['result']=='insertSuccess'){
             echo "<div class='col-md-8' style='color: green'>
             Customer was successfully added !
          </div>";
         }
         else if ($_GET['result']=='insertFailed'){
             echo "<div class='col-md-8' style='color: red'>
             Unable to add! Person already exists!
          </div>";
         }
         
         else if ($_GET['result']=='deleteSuccess'){
             echo "<div class='col-md-4' style='color: teal'>
             Customer was successfully removed!
          </div>";
         
         }
         else if ($_GET['result']=='deleteFailed'){
             echo "<div class='col-md-4' style='color: red'>
             Unable to delete! Customer does not exist!
          </div>";
         
         }
         else if ($_GET['result']=='editSuccess'){
             echo "<div class='col-md-4' style='color: blue'>
             Customer succesfully updated!
          </div>";
         
         }
         
     }

?>
       
        </div>
      </div>

<?php
    require('admin_footer.php');

?>



		
        
       