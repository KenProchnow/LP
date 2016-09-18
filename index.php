<!DOCTYPE html>

<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style>
  body {
    background-image: url("imgs/money.jpg") ;
    background-color: #cccccc;
    background-attachment: fixed;

  }
  .area {    
     background-color: rgba(0, 0, 0, 0.7);
     height: 1000px !important;
     width: 100% !important;
     text-align: center;
  }
  </style>

</head>

<?php

$email = isset($_POST['email']) ? $_POST['email'] : null ;
$submit = isset($_POST['submit']) ? $_POST['submit'] : null ;

if ($email) {

}

if ($submit && $email) {
  $host = "localhost";      // MySQl host
  $user = "root";       // MySQL username
  $pass = "root";       // MySQL password
  $dbname = "lead_gen";       // MySQL database name

  // error_reporting(0);

  // Establish a connection to the database
  $db = mysqli_connect($host, $user, $pass, $dbname);

  // Check connection
  if (!$db) {
      echo "sorry we are having some technical issues";
      exit;
  }

  $sql = "
    INSERT INTO leads (email, date_created)
    VALUES ( '$email' ,now() );
    ";
  
  if (mysqli_query($db, $sql)) {
      $message =  "Thanks for submitting, Please check your email";

  } else {
      $message =  "something went wrong";
      echo "Error: " . $sql . "<br>" . mysqli_error($db);
  }

  mysqli_close($db);

} elseif ($submit && !$email) {
  $message = "You didn't provide your email, Please enter again and submit";
} else {
  $message = "";
}


?>

<body class="area">


<div class="container area"> 
  <h2 style="color:lightgrey; padding-top: 150px;"> <?php echo $message; ?> </h2>
  
  <form class="form-inline" action="" method="POST">
    <h2 style="color:lightgrey; padding-top: 50px;">Do you want to get Rich!!!?</h2>
    <h3 style="color:lightgrey;">Receive a free quick pdf guide now! :)</h3>
    <!-- <img src="imgs/money.jpg" alt="Mountain View" style="width:404px;"> -->
    <br/> 
    <div class="form-group">
    <label class="sr-only" for="email">Email:</label>
    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
    <input type="hidden" name="submit" class="form-control" id="submit" value="submit">
    </div>
    <br> <br>
    <button type="submit" class="btn btn-success">Submit</button>
  </form>
</div>

</body>
</html>

