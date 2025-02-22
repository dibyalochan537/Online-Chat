<?php
    include("./php/connection.php");
    if(isset($_POST['create'])){
        // include("./php/userRegisterTable.php");
        $myName=$_POST['myName'];
        $phNumber=$_POST['myPhNumber'];
        $myNewPassword=$_POST['myNewPassword'];
        $myConfirmPasswod=$_POST['myConfirmPassword'];
        $sql_u="SELECT * FROM userregistration WHERE phNumber='$phNumber';";
        $res_u=mysqli_query($conn,$sql_u);
          if((mysqli_num_rows($res_u))>0){
            $user_error="Sorry Phone Number Already Exists !!";
          }
          else{
            if(($myNewPassword==$myConfirmPasswod)&& ($myNewPassword)!==""){
              $insertQuery="INSERT INTO userregistration(name,phNumber,password)  VALUES('$myName','$phNumber','$myNewPassword');";
              $data=mysqli_query($conn,$insertQuery);
              if($data){
                header("location:otp.php");
              }
              else{
                echo "Not insert";
              }
            }
            else{
                $password_error="Password does not match !!";
            }
          }
      } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register WC</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .box{
            margin-top:13%;
        }
        .box-page i{
            margin-left:30%;
        }
        .login-btn input{
            margin-top:20px;
            width:14%;
            height:30px;
            border-radius:8px;
            font-size:25px;
            margin-left:25%;
            cursor: pointer;
        }
        input[type=number]::-webkit-outer-spin-button,
        input[type=number]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
</head>
<body>
    <main>
    <div class="box">
            <div class="box-page">
                <i class="fa-brands fa-whatsapp"></i>
            </div>
          <form action="#" method="POST">
            <div class="box-name">
                    <select name="" id="">
                        <option value="1">+91</option>
                        <option value="2">+61</option>
                        <option value="3">+17</option>
                        <option value="4">+93</option>
                        <option value="5">+32</option>
                        <option value="6">+45</option>
                        <option value="7">+69</option>
                        <option value="8">+14</option>
                        <option value="9">+68</option>
                        <option value="10">+34</option>
                    </select>
                    <input type="number" placeholder="Enter Number" style="background-color:white;" required name="myPhNumber">
                    <?php if (isset($user_error)): ?>
                    <?php echo $user_error; ?>
                    <?php endif ?>
                    <br>
                    <input type="text" placeholder="Enter Your Name" style="background-color:white;" required name="myName">
                    <br>
                    <input type="password" placeholder="New Password"   style="background-color:white;"  name="myNewPassword">
                    <br>
                    <input type="password" placeholder="Confirm Password"   style="background-color:white;"  name="myConfirmPassword">
                    <?php if (isset($password_error)): ?>
                    <?php echo $password_error; ?>
                    <?php endif ?>
            </div>
            <div class="login-btn">
                <input type="submit" value="Register" style="background-color:red;" name="create">
            </div>
          </form>
        </div>
    </main>
</body>
</html>