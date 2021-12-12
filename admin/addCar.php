<?php 
require('authenticate.php');
require('dbconnector.php');

if(isset($_GET['carID']))
{
  $mode="Edit";    
  $carID=$_GET['carID'];
    
   $query = "SELECT car_make, car_model, car_year, car_trim, car_price, car_mileage, car_engine, "
       ." car_transmission, car_color, car_body_type, car_condition, car_description, VIN, car_status, date_added ".
       " from cars WHERE car_ID =?";
    $stmt = $connection->prepare($query);  
    
    $stmt->bind_param('i',$carID);
    $stmt->execute();
    
    $stmt->bind_result($make, $model, $year, $trim, $price, $mileage, $engine, $transmission,
                      $color, $body_type, $condition, $description, $VIN, $status, $date_added);
    $stmt->store_result();
    if($stmt->num_rows ==1){
       
        $stmt->fetch();
    }
    
}
else{
    $mode="Add new";
    $carID=-1;
}


require('admin_menu.php');

?>

  
   <div class="jumbotron">
    
     <div class="container"> 
     <div class="row">
         <div class="col-md-8">
            <h1 class="display-3"><?php echo $mode; ?>  car</h1>
          </div>
          
        
     </div>
    

          <hr class="my-4">
       <div class="row">
        <form action="insertCar.php" method="POST">
        <input type='hidden' name='dbID' value="<?php echo $carID; ?>">
         <table class="table">
             
          <tr>
          

           <td>Make :</td>
           <td> <select style="width: 175px;" name="make" id="make">
             <?php
                
                $allmakes = array("Acura", "Audi", "BMW", "Bentley", "Cadillac","Chevrolet", "Chrysler","Dodge", 
                                "Ferrari", "Ford","Genesis", "GMC", "Honda", "Hyundai", "Infiniti",
                                "Isuzu", "Jaguar","Jeep", "Kia", "Lamborghini", "Lotus", "Mahindra",
                                "Mazda", "McLaren","Mercedes-Benz", "Mitsubishi", "Nissan", "Oldsmobile", "Peugeot",
                                 "Opel", "Polestar","Pontiac", "Porsche", "RAM", "Renault", "Rivian",
                                "Rolls-Royce", "Rover","Saturn", "Scion", "Subaru", "Suzuki", "Tesla","Toyota","Volkswagen","Volvo");
                
                foreach($allmakes as $cmake)
                {
                    echo "<option value='".$cmake."'";
                    if(isset($make) && $make ==$cmake) echo "selected";
                    echo ">".$cmake."</option>";
                    
                }                
                ?>             
             
             
              <option value="Opel"></option>
              <option value="Peugeot"></option>
              <option value="Polestar"></option>
              <option value="Pontiac"></option>
              <option value="Porsche"></option>
              <option value="Proton">Proton</option>
              <option value="RAM"></option>
              <option value="Renault"></option>
              <option value="Rivian"></option>              
              <option value="Rolls-Royce"></option>
              <option value="Rover"></option>
              <option value="Saturn"></option>
              <option value="Scion"></option>
              <option value="Subaru"></option>
              <option value="Suzuki"></option>
              <option value="Tesla"></option>
              <option value="Toyota"></option>
              <option value="Volkswagen"></option>
              <option value="Volvo"></option>
            </select></td>
            <td>Model :</td>
           <td><input class="textBox" type="text" name="model" required <?php if(isset($model)) { echo "value='$model'";} ?>></td>
          </tr>

          <tr>
           <td>VIN :</td>
           <td><input class="textBox" type="text" name="carID" required <?php if(isset($VIN)) { echo "value='$VIN'";} ?>></td>
           

           <td>Trim:</td>
           <td><input  class="textBox" type="text" name="trim" required <?php if(isset($trim)) { echo "value='$trim'";} ?>></td>
          </tr>

          <tr>
              <td>Price: </td>
              <td><input class="textBox"  type="text" name="price" required <?php if(isset($price)) { echo "value='$price'";} ?>></td>

              <td>Mileage: </td>
              <td><input class="textBox"  type="text" name="mileage" required <?php if(isset($mileage)) { echo "value='$mileage'";} ?>></td>
          </tr>

          <tr>
              <td>Engine: </td>
              <td><input class="textBox"  style="outline-color: #4eb5f1;" type="text" name="engine" required <?php if(isset($engine)) { echo "value='$engine'";} ?>></td>

              <td> Date Added: </td>
              <td><input class="textBox" type="date" name="dateAdded" required <?php if(isset($date_added)) { echo "value='$date_added'";} ?>></td>
          </tr> 
          <tr>           
                <td> Year: </td>
                <td>
                <select style="width: 175px;" name="year" id="year">
             <?php
                
                $colors = array("Black", "White", "Grey", "Red", "Pink","Purple", "Brown","Green", 
                                "Metalic", "Blue","Silver", "Gold", "Yellow", "Beige", "Orange" );
                
                for($yr=2021;$yr>1970;$yr--)
                {
                    echo "<option value='".$yr."'";
                    if(isset($year) && $year ==$yr) echo "selected";
                    echo ">".$yr."</option>";
                    
                }                
                ?>             
              
            </select>                
               </td>    
                <td >Transmission:</td>
          <td>
            <input type="radio" name="transmission" value="Automatic" id="Automatic" <?php if(isset($transmission) && $transmission=='Automatic' ) { echo "checked";} ?>>
            <label for="Automatic">Automatic</label>
            <input type="radio" name="transmission" value="Manual" id="Manual" <?php if(isset($transmission) && $transmission=='Manual' ) { echo "checked";} ?>>
            <label for="Manual">Manual</label></td>
          </td>       
        </tr>

        <tr>
          

          <td>Color: </td>
          <td>
            <select style="width: 175px;" name="color" id="color">
             <?php
                
                $colors = array("Black", "White", "Grey", "Red", "Pink","Purple", "Brown","Green", 
                                "Metalic", "Blue","Silver", "Gold", "Yellow", "Beige", "Orange" );
                
                foreach($colors as $clr)
                {
                    echo "<option value='".$clr."'";
                    if(isset($color) && $color ==$clr) echo "selected";
                    echo ">".$clr."</option>";
                    
                }                
                ?>             
              
            </select>
        </td>
         <td> Bodytype</td>
            <td>
                <select style="width: 175px;" name="bodytype" id="bodytype">
                    <option value="Sedan"  <?php if(isset($body_type) && $body_type=='sedan' ) { echo "selected";} ?>>Sedan</option>
                    <option value="SUV" <?php if(isset($body_type) && $body_type=='SUV' ) { echo "selected";} ?>>SUV</option>
                    <option value="Van" <?php if(isset($body_type) && $body_type=='Van' ) { echo "selected";} ?>>Van</option>
                    <option value="Truck" <?php if(isset($body_type) && $body_type=='Truck' ) { echo "selected";} ?>>Truck</option>
                    <option value="Coupe" <?php if(isset($body_type) && $body_type=='Coupe' ) { echo "selected";} ?>>Coupe</option>
                    <option value="Convertible" <?php if(isset($body_type) && $body_type=='Convertible' ) { echo "selected";} ?>>Convertible</option>
                </select>
            </td> 
        </tr>
        <tr>
            <td>Condition</td> 
            <td>
                <select style="width: 175px;" name="carCondition" id="carCondition">
                    <option value="Like New" <?php if(isset($condition) && $condition=='Like New' ) { echo "selected";} ?>>Like New</option>
                    <option value="Excellent" <?php if(isset($condition) && $condition=='Excellent' ) { echo "selected";} ?>>Excellent</option>
                    <option value="Good" <?php if(isset($condition) && $condition=='Good' ) { echo "selected";} ?>>Good</option>
                    <option value="Average" <?php if(isset($condition) && $condition=='Average' ) { echo "selected";} ?>>Average</option>
                    <option value="Poor" <?php if(isset($condition) && $condition=='Poor' ) { echo "selected";} ?>>Poor</option>
                </select>
            </td>
            
             <td>Description</td> 
            <td>
               <textarea  name="carDescription" id="carDescription" rows="5" cols="35" ><?php if(isset($description)) { echo $description; } ?></textarea>
               
            </td>
           
           </tr> 
           <tr> <td>&nbsp;</td> <td>&nbsp;</td><td>&nbsp;</td><td><input type="submit" id="btn" name="submit" value="Save to inventory"> <a href="fetchCar.php">Go back</a></td> </tr>
           </table>

        </form>
 
        </div>
        
      </div> 
</div>

<?php
    require('admin_footer.php');

?>


