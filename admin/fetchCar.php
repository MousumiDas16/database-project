<?php 
require('authenticate.php');
require('dbconnector.php');

require('admin_menu.php');

?>

  
   <div class="jumbotron">
    
     <div class="container">
     <div class="row">
         <div class="col-md-8">
            <h1 class="display-3">Current inventory</h1>
          </div>
          
        
     </div>
    

          <hr class="my-4">
              
               <table class="table">
          <tr>
              
                <th scope="col">Year</th>
                <th scope="col">Make</th>
                <th scope="col">Model</th>
                <th scope="col">Trim</th>
                <th scope="col">Price</th>
                <th scope="col">Mileage</th>
                <th scope="col">Engine</th>                
                <th scope="col">Transmission</th>
                <th scope="col">Color</th>
                <th scope="col">Car Condition</th>
                <th scope="col">Body Type</th>
				<th scope="col">VIN</th>
        <th scope="col"> </th>
         <th scope="col"> </th>
          </tr>
         
              <?php

        $sql = "SELECT * FROM cars";
        $result = $connection->query($sql);
        if($result->num_rows>0)
        {
            while($row=$result -> fetch_assoc())
            {
               echo "<tr><td>". $row['car_year']."</td>\n";
               echo "<td>". $row['car_make']."</td>\n";
               echo "<td>". $row['car_model']."</td>\n";
               echo "<td>". $row['car_trim']."</td>\n";
               echo "<td>". $row['car_price']."</td>\n";
               echo "<td>". $row['car_mileage']."</td>\n";
               echo "<td>". $row['car_engine']."</td>\n";
               echo "<td>". $row['car_transmission']."</td>\n";
               echo "<td>". $row['car_color']."</td>\n";
               echo "<td>". $row['car_condition']."</td>\n";
               echo "<td>". $row['car_body_type']."</td>\n";
               echo "<td>". $row['VIN']."</td>";
                 echo "<td><a href='addCar.php?carID=". $row['car_ID']."'>EDIT</a></td>";
               echo "<td><a  onclick=\"return confirm('Do you really want to delete this car?')\" href='deleteCar.php?carID=". $row['car_ID']."'>DELETE</a></td>\n </tr>";
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
             <h5><a href="addCar.php">Add a new car</a></h5>
          </div>
          <?php
     if (isset($_GET['result'])){
         
         if ($_GET['result']=='insertSuccess'){
             echo "<div class='col-md-8' style='color: green'>
             Car was successfully added to the inventory!
          </div>";
         }
         else if ($_GET['result']=='insertFailed'){
             echo "<div class='col-md-8' style='color: red'>
             Unable to add! Entry already exists!
          </div>";
         }
         
         else if ($_GET['result']=='deleteSuccess'){
             echo "<div class='col-md-4' style='color: teal'>
             Car was successfully removed from the inventory!
          </div>";
         
         }
         else if ($_GET['result']=='deleteFailed'){
             echo "<div class='col-md-4' style='color: red'>
             Unable to delete! Entry does not exist!
          </div>";
         
         }
          else if ($_GET['result']=='editSuccess'){
             echo "<div class='col-md-4' style='color: blue'>
             Entry succesfully updated!
          </div>";
         
         }
         
     }

?>
       
        </div>
      </div>
      
       
        </div>
     

<?php
    require('admin_footer.php');

?>



		
        
       