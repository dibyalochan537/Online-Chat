<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Otp Verify</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body{
            background-image: url("./image/chatt_room_message_show.png");
        }
        .box{
            margin-top:13%;
            margin-left:42%;
        }
        .box-page{
            height:200px;
            width:250px;
            text-align: center;
        }
        .box-page i{
            font-size:200px;
            color:green;
            margin-left:30%;
        }
        .otp-verify{
            height:50px;
        }
        .input-otp input{
            width:2%;
            background-color: transparent;
            border-color: transparent;
            border-bottom-color:red;
            font-size:20px;
        }
        .otp-name{
            font-size: 20px;
            height:30px;
        }
        .input-otp{
            display: none;
            height:40px;
            line-height: 40px;
        }
        .input-otp input:focus{
            outline: none;
        }
        .input-otp p{
            display: inline-block;
            background-color: orangered;
            border-radius:50px;
            border-color: transparent;
            cursor: pointer;
            width:70px;
            height:35px;
            line-height:40px;
            text-align: center;
            font-size: 25px;
            margin:0;
            padding: 0;
            margin-left:10px;
        }
        .login-btn input{
            margin-top:50px;
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
        <form action="login.php" method="POST">
            <div class="box">
                <div class="box-page">
                    <i class="fa-brands fa-whatsapp"></i>
                </div>
                <div class="otp-verify">
                    <div class="otp-name">  
                        <p><input type="checkbox" id="openVerifyOtp" required>Verify OTP :</p>
                    </div>
                        <div class="input-otp" id="openOtp"> 
                            <input type="text" maxlength="1"  class="accessOtp" id="1">
                            <input type="text" maxlength="1"  class="accessOtp" id="2">
                            <input type="text" maxlength="1"  class="accessOtp" id="3">
                            <input type="text" maxlength="1"  class="accessOtp" id="4">
                            <input type="text" maxlength="1"  class="accessOtp" id="5">
                            <input type="text" maxlength="1"  class="accessOtp" id="6">
                            <p id="verifyOtp" onclick="verifyOtp();">Verify</p>
                        </div>
                </div>
                <div class="login-btn">
                    <input type="submit" value="Register" style="background-color:red;" id="registerBtn" disabled>
                </div>
            </div>
        </form>
    </main>
    <script>
        const registerBtn=document.getElementById("registerBtn");
        const otpIdAccess=document.getElementById("openVerifyOtp");
        const otpVerifyBtn=document.getElementById("verifyOtp");
        const x=document.getElementById("openOtp");

        // Verification of OTP
        let verifyReceivedOtp;
        let openVerifyOtp=()=>{
          otpIdAccess.addEventListener("change",function fun(){
            if(this.checked){
              this.disabled=true;
              x.style.display="block";
              const ReceivedOtp=sendOtp();
              verifyReceivedOtp=ReceivedOtp;
            }
            else{
              alert("Please OTP verify");
              x.style.display="none";
            }
          }) 
        }
        openVerifyOtp();
        // import * as twilio from 'twilio';
        const otpArray=new Array(6);
        const enteredOtpArray=new Array(6);
        // const enteredOtp=document.querySelectorAll(".enterOtp");
        // let otpPrint=document.getElementById(y);
        function enteredOtp(){
            let otpId=1;
            for (let i = 0; i < enteredOtpArray.length; i++) {
              let otpNumber=document.getElementById(otpId);
              enteredOtpArray[i]=otpNumber.value;
              otpId++;
            }
            return enteredOtpArray;
        }
        function verifyOtp(){
          const verifyEnteredOtp=enteredOtp();
            if(verifyReceivedOtp.toString()===verifyEnteredOtp.toString()){
              registerBtn.disabled=false;
            }
            else{
              registerBtn.disabled=true;
            }
        }
        function sendOtp(){
          for (let i = 0; i < otpArray.length; i++) {
            // let randomRdx=Math.floor(Math.random()*6);
            // otpArray[i]=randomRdx;
            // console.log(otpArray[i]);
            otpArray[i]=i;
          }
          return otpArray;
        }
        // All verification of otp is completed
      </script>
</body>
</html>