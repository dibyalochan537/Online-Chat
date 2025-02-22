<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .otp-verify{
      height:30px;
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
    </style>
</head>
<body>
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
                              <input type="text" maxlength="1"  class="accessOtp" id="6"><p id="verifyOtp" onclick="verifyOtp();">Verify</p>
                            </div>
</div>
<input type="submit" value="Register" style="background-color:red;" id="registerBtn" disabled>
<script>
        const registerBtn=document.getElementById("registerBtn");
        const otpIdAccess=document.getElementById("openVerifyOtp");
        const otpVerifyBtn=document.getElementById("verifyOtp");
        const x=document.getElementById("openOtp");
        function showPsw(){
          var pwd=document.getElementById("psw")
          var conf_pwd=document.getElementById("conf-psw");
          
          if(psw.type === "text"){
            psw.type = "password";
          }
          else{
            psw.type = "text";
          }
          if(confpsw.type === "text"){
            confpsw.type = "password";
          }
          else{
            confpsw.type = "text";
          }
        }

        // Verification of OTP
        var verifyReceivedOtp;
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