const chatDetails=document.getElementById("chatDetails");
const contactList=document.getElementById("contactList");
const openChatListSearch=document.getElementById("openChatListSearch");
const chatListNav=document.getElementById("chatListNav");
function openContactList(){
    chatDetails.style.display="none";
    contactList.style.display="block";
}
function closeContactList(){
    contactList.style.display="none";
    chatDetails.style.display="block";
        }
function closeChatListNav(){
    chatListNav.style.display="none";
    openChatListSearch.style.display="block";
    openChatListSearch.style.display="flex";
}
function openChatListNav(){
    openChatListSearch.style.display="none";
    chatListNav.style.display="block";
    chatListNav.style.display="flex";
}
//contact add on
const openAddPopUp=document.getElementById("chatListOpened");
const addContactPopUp=document.getElementById("addContactPopup");
function addContactPopUpOpen(){
    openAddPopUp.style.display="none";
    addContactPopUp.style.display="block";
}
//add cancel function
const addDetailsOpened=document.getElementById("addDetailsOpened");
const allContactList=document.getElementById("all-contact-list");
function cancelAdd(){
    addDetailsOpened.style.display="none";
    addContactPopup.style.display="none";
    chatListOpened.style.display="block";
}