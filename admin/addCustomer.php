<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car shop: Add customer</title>
    <link rel="stylesheet" href="admin.css">
</head>


<body>
    <h3 style="text-align: center; font-family:'Roboto',sans-serif; color: #4eb5f1; font-size: 35px;">Add New Customer</h3>

    <div class = "mainMenu" >
        <form action="insertCustomer.php" method="POST">
         <table style="margin-top: 10px;">
             
          <tr>
           <td>First Name :</td>
           <td><input class="textBox" type="text" name="firstname"  <?php if(isset($model)) { echo "value='$model'";} ?>></td>

           <td>Last Name :</td>
           <td><input class="textBox" type="text" name="lastname"  <?php if(isset($model)) { echo "value='$model'";} ?>></td>
          </tr>

          <tr>
           <td>Street :</td>
           <td><input class="textBox" type="text" name="street" <?php if(isset($model)) { echo "value='$model'";} ?>></td>

           <td>City:</td>
           <td><input  class="textBox" type="text" name="city" <?php if(isset($model)) { echo "value='$model'";} ?> ></td>
          </tr>

          <tr>
              <td>State: </td>
              <td><input class="textBox"  type="text" name="state" <?php if(isset($model)) { echo "value='$model'";} ?> ></td>

              <td>Zip Code: </td>
              <td><input class="textBox"  type="text" name="zipcode" <?php if(isset($model)) { echo "value='$model'";} ?> ></td>
          </tr>

          <tr>
              <td>Phone Number: </td>
              <td><input class="textBox"  style="outline-color: #4eb5f1;" type="text" name="phonenumber"  <?php if(isset($model)) { echo "value='$model'";} ?>></td>

              <td> Email: </td>
              <td><input class="textBox"  type="text" name="email" <?php if(isset($model)) { echo "value='$model'";} ?> ></td>
          </tr> 

          <tr>
            <td>Username: </td>
            <td><input class="textBox"  style="outline-color: #4eb5f1;" type="text" name="username"  <?php if(isset($model)) { echo "value='$model'";} ?>></td>

            <td> Date of Birth: </td>
            <td><input class="textBox"  type="date" name="dateofbirth" <?php if(isset($model)) { echo "value='$model'";} ?> ></td>
        </tr> 



    </table>
    <td style="text-align: center;">
        <input  class="button1" type="submit" value="Submit" name="submit"></td>
    <td style="text-align: center;">
        <input  class="button1" type="reset" value="Clear Form"></td>
    <td style="text-align: center;">
        <input  class="button1" type="button" value="Main Menu" name="mainMenu" onclick="document.location.href = 'http://127.0.0.1:5500/mainMenu.html'"></td>
        </form>
    </div>
</body>
</html>