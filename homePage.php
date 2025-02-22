<?php
  session_start();
 include("./php/connection.php");
 error_reporting(error_level: 0);
 $userprofile = $_SESSION['ph_number'];
 if($userprofile == true){

 }
 else{
    header(header: 'location:login.php');
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat World</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="./Style/homeStyle.css">
    <link rel="stylesheet" href="./Style/actionDiv.css">
    <link rel="stylesheet" href="./Style/chatList.css">
    <link rel="stylesheet" href="./Style/contactList.css">
    <style>
    .add-contact-div{
        display: flex;
        background-color: bisque;
        align-items: center;
    }
    .add-contact-div i{
        font-size: 20px;
    }
    #addContactPopup{
        display: none;
    }
    </style>
</head>
<body>
    <header>
        <div class="nav-bar">
            <div class="logo-name-nav-bar">
               <p >&nbsp;<i class="fa-brands fa-whatsapp"></i> Chat World</p>
            </div>
            <!-- <div class="dark-mode-on-of">
                <input type="">
            </div> -->
        </div>
    </header>
    <main> 
        <div class="main-div" style="margin-top:0px">
            <!-- Side border details for different button -->
            <div class="action-div">
                <div class="chatting-direct">
                    <div class="all-bar-show b-div">
                       <button  ><i class="fa-solid fa-bars"></i></button>
                    </div>
                    <div class="message-logo-div b-div">
                        <button><i class="fa-solid fa-comment-sms"></i></button>
                    </div>
                    <div class="call-logo-div b-div">
                        <button><i class="fa-solid fa-phone"></i></button>
                    </div>
                    <div class="status-div b-div">
                        <button><i class="fa-solid fa-record-vinyl"></i></button>
                    </div>
                </div>
                <div class="chatting-setting-archive">
                    <div class="all-bar-show a-div">
                        <button><i class="fa-regular fa-star"></i></button>
                    </div>
                    <div class="message-logo-div a-div">
                        <button><i class="fa-solid fa-box-archive"></i></button>
                    </div>
                    <div class="call-logo-div a-div">
                        <button><i class="fa-solid fa-gear"></i></button>
                    </div>
                    <div class="status-div a-div">
                        <button onclick="profilePopUp()"><i class="fa-solid fa-circle-user"></i></button>
                    </div>
                    <!-- Start popup profile div -->
                    <div class="profile-formPopup" id="profileFormPopup">
                        <div class="profile-image">
                            <div class="image-div-popup">
                                <img src="./image/yash.png" alt="yash">
                            </div>
                        </div>
                        <div class="pppname">
                            <p>Dibyalochan Dash</p>
                        </div>
                        <div class="about-profile-popup">
                            <p>About</p>
                            <p class="pbtn">I am Dibyalochan Dash</p>
                        </div>
                        <div class="ppp-phnumber">
                            <p>Phone Number</p>
                            <p class="pbtn">
                                <?php
                                    echo $_SESSION['ph_number']
                                ?>
                            </p>
                        </div>
                        <div class="logout-div">
                            <a href="logout.php"><Button>Logout</Button></a>
                        </div>
                   </div>
                    
                    <!-- End popup profile div -->
                </div>
            </div>
            <!-- Chatting contact show and message div-->
            <div class="chat-details" >
                <!-- Chatting contact list -->
               <div class="chats-list-div"  id="chatDetails">
                   <div class="type-of-chat"></div>
                   <div class="search-chat">
                      <input type="search" placeholder="Search or Start a new Chat">
                   </div>
                   <div class="chatting-all-contact">
                        <div class="open-contact">
                            <button onclick="openContactList()"><i class="fa-solid fa-message"></i></button>
                        </div>
                   </div>
               </div>
               <!-- Contact list open when chat list close -->
               <div class="chats-list-div" id="contactList">
                    <div class="nav-contact-list" id="openChatListSearch">
                        <div class="nav-back-btn">
                            <button class="cldbtn"  onclick="openChatListNav()"><i class="fa-solid fa-arrow-left-long"></i></button>
                        </div>
                        <div class="search-field-nav-chat">
                            <input type="search" placeholder="Search Contact" class="inputNavContactChat">
                        </div>
                        <div class="keyboard">
                            <button><i class="fa-regular fa-keyboard"></i></button>
                        </div>
                    </div>
                    <!-- Close here nav search -->
                   <div class="nav-contact-list" id="chatListNav">
                        <div class="nav-back-btn">
                          <button class="cldbtn"  onclick="closeContactList()"><i class="fa-solid fa-arrow-left-long"></i></button>
                        </div>
                        <div class="select-contact">
                            <p class="select-cl">Select Contact</p>
                           <p class="total-contact">500 Contacts</p>
                        </div>
                        <div class="search-nav-contact">
                           <button     class="cldbtn" onclick="closeChatListNav()"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                        <div class="invite-refresh">
                            <button     class="cldbtn"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                        </div>        
                   </div>

                   <!-- Chatt contact show -->
                   <div class="contacts-on-chat"    id="chatListOpened">
                        <div class="add-contact-div" onclick="addContactPopUpOpen()">
                            <button class="cldbtn"   onclick="addContactPopUpOpen()">
                                <i class="fa-solid fa-user-plus"></i>
                            </button>
                            <p>Add New Contact</p>
                        </div>
                        <div class="contact-list-all"   id="all-contact-list">
                            
                        </div>
                   </div>
                   <div class="contacts-on-chat"    id="addContactPopup">
                        <div class="addContactPopNav">
                            <p>Add New Contact</p>
                        </div>
                        <div class="allDetailInput"  id="addDetailsOpened">
                            <form action="#" method="POST">
                                <p>Name</p>
                                <div class="name-input-div">
                                    <input type="text"  placeholder="First Name"  required name="firstName">
                                    <input type="text"  placeholder="Middle Name" name="middleName">
                                    <input type="text"  placeholder="Last Name"  required name="lastName">
                                </div>
                                <div class="phone-number-input">
                                    <p>Phone Number</p>
                                    <select name="" id="">
                                        <option value="1">+91</option>
                                        <option value="2">+16</option>
                                        <option value="3">+26</option>
                                        <option value="4">+143</option>
                                    </select>
                                    <input type="text" maxlength="10" name="phNumber">
                                </div>
                                <div class="to-add-cancel">
                                    <button onclick="cancelAdd()">Cancel</button>
                                    <input type="submit" name="addContact">
                                </div>

                            </form>
                        </div>
                   </div>
               </div>
               <style>
                    .addContactPopNav{
                        display: flex;
                        justify-content: center;
                        font-size:30px;
                        background-color: bisque;
                    }
                    .allDetailInput p{
                        font-size:25px;
                        padding-bottom:10px;
                    }
                    .allDetailInput input{
                        outline: none;
                        font-size:18px;
                    }
                    .phone-number-input{
                        margin-top:40px;
                        padding-bottom:50px;
                    }
                    .name-input-div{
                        display: flex;
                        justify-content: space-around;
                    }
                    .name-input-div input{
                        width:30%;
                    }
                    .to-add-cancel{
                        display: flex;
                        justify-content: space-evenly;
                    }
                    .to-add-cancel button{
                        font-size:30px;
                        border-radius:50px;
                        width:120px;
                        background-color:orangered;
                    }
                    .to-add-cancel input{
                        font-size:30px;
                        border-radius:50px;
                        width:120px;
                        background-color: green;
                    }
               </style>
               <!-- Open chat list nav search -->
               
               <!-- Close chat list nav search -->
               <!-- Contact list close when back list close -->
               <!-- Chatting message room -->
               <div class="chat-room-div">

                   <!-- Chatting mesage top -->
                   <div class="profile-div-top">
                      <div class="profile-photo">
                        <i class="fa-solid fa-circle-user"></i>
                      </div>

                      <div class="name-last-seen">
                        <div class="name-of-profile lseen-name">
                            <p>
                                <?php
                                    echo $_SESSION['user_name'];
                                ?>
                            </p>
                        </div>
                        <div class="last-seen-online lseen-name">
                            <p>Last Seen Yesterday 19:30 AM</p>
                        </div>
                      </div>

                      <div class="vc-ac-search-message">
                        <div class="video-call-personal personal-vvm">
                            <button><i class="fa-solid fa-video"></i></button>
                        </div>
                        <div class="voice-call-personal personal-vvm" style="border-right:1px solid black">
                            <button><i class="fa-solid fa-phone"></i></button>
                        </div>
                        <div class="message-search-personal personal-vvm" >
                            <button><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                      </div>
                   </div>

                   <!-- Chatting message show  -->
                   <div class="message-show-div"></div>
                   <!-- Chatting typing here -->
                   <div class="message-type-div">
                     <div class="emoji-button-tag btm-height">
                        <button><i class="fa-regular fa-face-smile"></i></button>
                     </div>
                     <div class="file-photo-select-attach btm-height">
                        <button><i class="fa-solid fa-paperclip"></i></button>
                     </div>
                     <div class="mesage-type-here btm-height">
                        <input type="text" placeholder="Type your message here !!"  class="typeMessage">
                     </div>
                     <div class="voice-message btm-height">
                        <button id="mic"><i class="fa-solid fa-microphone"></i></button>
                        <button id="send" onclick="sendMessage();" style="display:none"><i class="fa-regular fa-paper-plane"></i></button>
                     </div>
                   </div>
               </div>
            </div>
        </div>
    </main>
    <script src="./JS/actionDiv.js"></script>
    <script src="./JS/chatRoomButtom.js"></script>
    <script src="./JS/chatRoomNav.js"></script>
    <script src="./JS/chatList.js"></script>
</body>
</html>
<?php
    session_start();
    include("./php/connection.php");
    $userprofile = $_SESSION['ph_number'];
    if(isset($_POST['addContact'])){
        $phNumber=$_POST['phNumber'];
        $getAllNumberFromDb="SELECT * FROM userregistration WHERE phNumber='$phNumber';";
        $executeGetAllNumberFromDb=mysqli_query($conn,$getAllNumberFromDb);
        $dataAvailable=mysqli_num_rows(executeGetAllNumberFromDb);
        if($dataAvailable>0){
            echo $executeGetAllNumberFromDb;
        }
        else{
            echo "Error";
        }
    }
?>