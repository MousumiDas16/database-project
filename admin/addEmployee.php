<?php 
require('authenticate.php');
require('dbconnector.php');

if(isset($_GET['empID']))
{
  $mode="Edit";    
  $empID=$_GET['empID'];
    
   $query = "SELECT first_name, last_name, role_ID, SSN, street, city, state, zip_code, phone_number, email, username, DOB, start_date".
       " from employees WHERE employee_ID =?";
    $stmt = $connection->prepare($query);  
    
    $stmt->bind_param('i',$empID);
    $stmt->execute();
    
    $stmt->bind_result($efirst_name, $elast_name, $erole, $SSN, $street, $city, $state, $zipcode, $phone_number,
                      $email, $eusername, $dob, $start_date);
    $stmt->store_result();
    if($stmt->num_rows ==1){
       
        $stmt->fetch();
    }
    
}
else{
    $mode="Add new";
    $empID=-1;
}


require('admin_menu.php');

?>
      
        <div class="jumbotron">
    
     <div class="container"> 
     <div class="row">
         <div class="col-md-8">
            <h1 class="display-3"><?php echo $mode; ?>  employee</h1>
          </div>
          
        
     </div>
    

          <hr class="my-4">
       <div class="row">
       
        <form action="insertEmployee.php" method="POST">
         <input type='hidden' name='employeeID' value="<?php echo $empID; ?>">
         <table class="table">             
          <tr>
          <tr>
           <td>First Name :</td>
           <td><input class="textBox" type="text" name="firstname" required <?php if(isset($efirst_name)) { echo "value='$efirst_name'";} ?>></td>

           <td>Last Name :</td>
           <td><input class="textBox" type="text" name="lastname" required <?php if(isset($elast_name)) { echo "value='$elast_name'";} ?>></td>
          </tr>

          <tr>
           <td>SSN :</td>
           <td><input class="textBox" type="text" name="ssn" required <?php if(isset($SSN)) { echo "value='$SSN'";} ?>></td>

           <td>Street:</td>
           <td><input  class="textBox" type="text" name="street" required <?php if(isset($street)) { echo "value='$street'";} ?>></td>
          </tr>

          <tr>
              <td>City: </td>
              <td><input class="textBox"  type="text" name="city" required <?php if(isset($city)) { echo "value='$city'";} ?>></td>

              <td>State: </td>
              <td><input class="textBox"  type="text" name="state" required <?php if(isset($state)) { echo "value='$state'";} ?>></td>
          </tr>

          <tr>
              <td>Zip Code: </td>
              <td><input class="textBox"  style="outline-color: #4eb5f1;" type="text" name="zipcode" required <?php if(isset($zipcode)) { echo "value='$zipcode'";} ?>></td>

              <td> Phone Number: </td>
              <td><input class="textBox"  type="tel" name="phonenumber" placeholder="123-456-6789" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required <?php if(isset($phone_number)) { echo "value='$phone_number'";} ?>></td>
          </tr> 

          <tr>
            <td>Email: </td>
            <td><input class="textBox"  style="outline-color: #4eb5f1;" type="email" name="email" required <?php if(isset($email)) { echo "value='$email'";} ?>></td>

            <td> Username: </td>
            <td><input class="textBox"  type="text" name="username" required <?php if(isset($eusername)) { echo "value='$eusername'";} ?>></td>
        </tr> 

        <tr>
            <td>Date of Birth</td>
            <td><input class="textBox"  style="outline-color: #4eb5f1;" type="date" name="dateofbirth" required <?php if(isset($dob)) { echo "value='$dob'";} ?>></td>

            <td> Start Date: </td>
            <td><input class="textBox"  type="date" name="startdate" required <?php if(isset($start_date)) { echo "value='$start_date'";} ?>></td>
        </tr> 
        <tr>
            <td> Password: </td>
            <td><input class="textBox"  type="password" name="password" id="password1" required></td>
            <td> Role: </td>
            <td>
            <select style="width: 175px;" name="emprole" id="emprole">
                    <option value="1"  <?php if(isset($erole) && $erole==1 ) { echo "selected";} ?>>Sales Representative</option>
                    <option value="2" <?php if(isset($erole) && $erole==2 ) { echo "selected";} ?>>Inventory Manager</option>
                    <option value="3" <?php if(isset($erole) && $erole==3) { echo "selected";} ?>>Accounts Manager</option>                    
                </select>
            
            </td>
        </tr>
        <tr>
            <td>Confirm Password: </td>
            <td><input class="textBox"  type="password" name="password" id="password2" required></td>
            
         <td>
        <input style="width: 120px"  type="submit" value="Save" name="submit"> &nbsp;    
        <input style="width: 120px"  type="reset" value="Clear Form"> <a href="fetchEmployee.php">Go back</a></td> 
        </tr>
        </table>
        
    </form>
    
         </div>
            </div>
            
</div>
   
   <script>
var password = document.getElementById("password1")
  , confirm_password = document.getElementById("password2");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>
    
    <?php
    require('admin_footer.php');

?>
