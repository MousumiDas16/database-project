<?php 
require('authenticate.php');
require('dbconnector.php');

if(isset($_GET['customerID']))
{
  $mode="Edit";    
  $customerID=$_GET['customerID'];
    
   $query = "SELECT customer_first_name, customer_last_name, customer_street, customer_city, customer_state, customer_zip_code,".
       " customer_phone_number, customer_email, customer_username, customer_DOB".
       " from customers WHERE customer_ID =?";
    $stmt = $connection->prepare($query);  
    
    $stmt->bind_param('i',$customerID);
    $stmt->execute();
    
    $stmt->bind_result($cfirst_name, $clast_name, $street, $city, $state, $zipcode, $phone_number,
                      $email, $cusername, $dob);
    $stmt->store_result();
    if($stmt->num_rows ==1){
       
        $stmt->fetch();
    }
    
}
else{
    $mode="Add new";
    $customerID=-1;
}


require('admin_menu.php');

?>
      
        <div class="jumbotron">
    
     <div class="container"> 
     <div class="row">
         <div class="col-md-8">
            <h1 class="display-3"><?php echo $mode; ?>  customer</h1>
          </div>
          
        
     </div>
    

          <hr class="my-4">
       <div class="row">       
         <form action="insertCustomer.php" method="POST">
         <input type='hidden' name='customerID' value="<?php echo $customerID; ?>">
         <table style="margin-top: 10px;">
             
          <tr>
           <td>First Name :</td>
           <td><input class="textBox" type="text" name="firstname"  <?php if(isset($cfirst_name)) { echo "value='$cfirst_name'";} ?>></td>

           <td>Last Name :</td>
           <td><input class="textBox" type="text" name="lastname"  <?php if(isset($clast_name)) { echo "value='$clast_name'";} ?>></td>
          </tr>

          <tr>
           <td>Street :</td>
           <td><input class="textBox" type="text" name="street" <?php if(isset($street)) { echo "value='$street'";} ?>></td>

           <td>City:</td>
           <td><input  class="textBox" type="text" name="city" <?php if(isset($city)) { echo "value='$city'";} ?> ></td>
          </tr>

          <tr>
              <td>State: </td>
              <td><input class="textBox"  type="text" name="state" <?php if(isset($state)) { echo "value='$state'";} ?> ></td>

              <td>Zip Code: </td>
              <td><input class="textBox"  type="text" name="zipcode" <?php if(isset($zipcode)) { echo "value='$zipcode'";} ?> ></td>
          </tr>

          <tr>
              <td>Phone Number: </td>
              <td><input class="textBox"  style="outline-color: #4eb5f1;" type="text" name="phonenumber"  <?php if(isset($phone_number)) { echo "value='$phone_number'";} ?>></td>

              <td> Email: </td>
              <td><input class="textBox"  type="email" name="email" <?php if(isset($email)) { echo "value='$email'";} ?> ></td>
          </tr> 

          <tr>
            <td>Username: </td>
            <td><input class="textBox"  style="outline-color: #4eb5f1;" type="text" name="username"  <?php if(isset($cusername)) { echo "value='$cusername'";} ?>></td>

            <td> Date of Birth: </td>
            <td><input class="textBox"  type="date" name="dateofbirth" <?php if(isset($dob)) { echo "value='$dob'";} ?> ></td>
        </tr> 
             <tr><td> &nbsp;</td> 
            <td colspan="3">
            <input style="width: 120px"  type="submit" value="Save" name="submit"> &nbsp;    
            <input style="width: 120px"  type="reset" value="Clear Form">
            <a href="fetchCustomers.php">Go back</a>
            </td> 
        </tr>


    </table>
    
        </form>
         </div>
            </div>
    
    <?php
    require('admin_footer.php');

?>
