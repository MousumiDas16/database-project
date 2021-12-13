<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie-edge">
  <title>Far From Broken @Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">


</head>
<body>
  <header>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Far From Broken
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="fetchCar.php">Inventory </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="fetchEmployee.php">Employees</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="fetchCustomers.php">Customers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Orders</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Commission</a>
          </li>        
        <li class="nav-item">
            <a class="nav-link" href="#">Reports</a>
          </li>
        </ul>
     
      </div>
    </nav>
  
   <div style="float: right; padding-right: 20px">
            <?php echo "<h5 >User: ". $first_name." ".$last_name."</h3>"; ?>
       <p> <a href="addEmployee.php?empID=<?php echo $userid; ?>">Profile</a> | <a href="logout.php">Log out</a> </p>
          </div>
          
    </header>