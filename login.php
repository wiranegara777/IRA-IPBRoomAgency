<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>IRA(IPB Room Agency)</title>
<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

<!-- Custom styles for this template -->
<link href="floating-labels.css" rel="stylesheet">
<!-- CSS Login -->
<style type="text/css">
/* Bordered form */
form {
    border: 3px solid #f1f1f1;
}

/* Full-width inputs */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

/* Add a hover effect for buttons */
button:hover {
    opacity: 0.8;
}

/* IRA Tittle */
.tittle {
    text-align: center;
}
/* Extra style for the signup button (cyan) */
.signup {
    width: auto;
    padding: 10px 18px;
    background-color: #008B8B ;
    color: white;
}

/* Center the avatar image inside this container */
.imgcontainer {
    text-align: center;
    margin: 20px 0 18px 0;
}

/* Avatar image */
img.avatar {
    width: 25%;
    border-radius: 40%;
}

/* Add padding to containers */
.container {
    padding: 16px;
}

/* The "Forgot password" text */
span.psw {
    float: center;
    padding-top: 16px;
}

/* Change styles for span and signup button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
        float: none;
    }
    .signup {
        width: 100%;
    }
}     
</style>
</head>
<body>
        <?php 
        if(isset($_GET['err'])){
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Wrong Email or Username !
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
        </div>
        <?php } ?>
  <div class="container">
    <div class="row">
      <div class="col-sm">
      </div>
      <div class="col-sm">
        <form action="proses/LoginProcess.php" method="post">
        <div class="imgcontainer">
          <img src="image/IPB.jpg" alt="Avatar" class="avatar">
        </div>
        <h2 class="tittle">IRA</h2>
        <h3 class="tittle">IPB Room Agency</h3>
        
        <div class="container">
          <label for="email"><b>Email</b></label>
          <input type="text" placeholder="Enter Email" name="email" required>

          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="password" required>
          <button type="submit" name="Submit" class="btn btn-primary">Log In</button>
          
        </div>

        <div class="container" style="background-color:#f1f1f1">
          <button type="button" class="btn btn-secondary" ><a href="register.php" style="color:white;">Register</a></button>
          <!-- <span class="psw">Forgot <a href="Forgot_Password.html">Password</a></span> -->
        </div>
        </form>
      </div>
      <div class="col-sm"></div>
</body>
</html>