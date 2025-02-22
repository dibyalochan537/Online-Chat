const input = document.querySelector(".typeMessage");
        let mic=document.getElementById("mic");
        let send=document.getElementById("send");
        let change="";
        input.addEventListener("input", (event) => {
            change=event.target.value;
            if(change!==""){
                mic.style.display="none";
                send.style.display="block";
            }
            else{
                mic.style.display="block";
                send.style.display="none";
            }
        });