<?php
session_start();
  include("./php/connection.php");
  $userNotFound="";
      if(isset($_POST['login'])){
        $phNumber=$_POST['phNumber'];
        $password=$_POST['password'];
        $queryLogin="SELECT * FROM userregistration WHERE phNumber='$phNumber' && password='$password' ;";
        $data=mysqli_query($conn,$queryLogin);
        $total= mysqli_num_rows($data);
        // echo $total;
        if($total == 1){
          $_SESSION['ph_number']=$phNumber;
          $sql="SELECT name FROM userregistration WHERE phNumber='$phNumber';";
          $sqlconn=mysqli_query($conn,$sql);
          $sqltotal=mysqli_num_rows($sqlconn);
          if($sqltotal==1){
            $row = mysqli_fetch_assoc($sqlconn);
            $_SESSION['user_name']=$row["name"];
          }
          header('location:homePage.php');
        }
        else{
          $userNotFound="User not Found";
        }
      }
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Login WC</title>
 <!-- <link rel="stylesheet" href="./Style/loginPage.css"> -->
 <link rel="stylesheet" href="style.css">
    <style>
    .login-name{
    width:fit-content;
    background-color: #25d366;
    height:60px;
    margin-left:25%;
  }
  .login-name p{
    font-size:50px;
    height:fit-content;
  }
  .formLogin{
    background-color:#dcf8c6;
    width:50%;
    margin-left:25%;
    height:500px;
  }
  .form-container{
    padding:20px;
  }
  .form-popup-size{
    font-size:40px;
  }
  .top{
    margin-top:40px;
  }
  .form-input{
    font-size:30px;
    outline: none;
  }
  .btn{
    font-size:30px;
    background-color: #25d366;
    border:none;
    border-radius: 100px;
    cursor: pointer;
  }
  .already-account{
    margin-top:10px;
    font-size:25px;
  }
  .already-login{
    border:none;
    background-color: transparent;
  }
  .error-div{
    height:20px;
  }
  input[type=number]::-webkit-outer-spin-button,
  input[type=number]::-webkit-inner-spin-button {
    -webkit-appearance: none;margin: 0;
  }

</style>
</head>
<body>
<div class="formLogin">
  <div class="login-name">
    <p>Login to your Profile</p>
  </div>
    <form action="#" class="form-container" method="POST">
         <div class="form-container-popup">
             <div class="form-user-details top">
              <label for="username" class="form-popup-size"><b>Phone Number : </b></label>
              <input type="number" inputmode="numeric" placeholder="Enter Phone Number" name="phNumber" required class="form-input" size="10" maxlength="10"> <br><br>
           </div>
    
             <div class="form-user-details top">
               <label for="psw" class="form-popup-size"><b>Password : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
               <input type="password" placeholder="Enter Password" name="password" required class="form-input">
               <?php if (isset($userNotFound)): ?>
               <?php echo $userNotFound; ?>
               <?php endif ?><br><br>
             </div>
             <div class="error-div">
                      
             </div>
         </div>
         <div class="login-close top">
            <input type="submit" value="Login" class="btn" name="login">
            <a href="index.php"><button type="button" class="btn">Close</button></a>
        </div>
        <div class="already-account">
            I have no Account?<a href="register.php">Register</a>
         </div>
     </form>
  </div>
</body>
</html>