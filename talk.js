let form = document.querySelector(".sendmsg");
let input_field = form.querySelector("#text");
let sendbtn =document.getElementById("click");
let chatbox =document.getElementById("chatBox");
let check =0;
form.onsubmit = (e)=>{
    e.preventDefault();
}
sendbtn.onclick = () =>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","php/insert-talk.php",true);
    xhr.onload =()=>{
         if(xhr.readyState==XMLHttpRequest.DONE){
            if(xhr.status==200){
                input_field.value="";
                check=1;
            }
         }
    }
    let fromData = new FormData(form);
    xhr.send(fromData);
    scroll();
}
function body(){
check=1;
}


setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","php/get-talk.php",true);
    xhr.onload =()=>{
         if(xhr.readyState==XMLHttpRequest.DONE){
            if(xhr.status==200){
                let data = xhr.response;
                chatbox.innerHTML = data;
                if(check==1){
                    chatbox.scrollTop = chatbox.scrollHeight;
                    check=0;
                }
            }
         }
    }
    let formData = new FormData(form);
    xhr.send(formData);
},700);
    function scroll(){
        chatbox.scrollTop=chatbox.scrollHeight;
    }

let talkmode=document.getElementById("talkmode");
let day =  document.getElementById("day");
let night  = document.getElementById("night");
let store = localStorage.getItem("change");
let menu_mobile = document.getElementById("menu_mobile");
let talkbody = document.getElementById("talkbody");
let out = document.getElementById("out");
let In = document.getElementById("out");
let outgoing_id = document.getElementById("outgoing_id");
let  incoming_id= document.getElementById("incoming_id");
let db_ic = document.getElementById("db_incoming");
let  db_og= document.getElementById("db_outgoing");
localStorage.setItem("outgoing_id",outgoing_id.value);
localStorage.setItem("incoming_id",incoming_id.value);
localStorage.setItem("db_ic",db_ic.value);
localStorage.setItem("db_og",db_og.value);

let bool= true;
let count=0;
if(bool){
    localStorage.setItem("countColorintalk",1);
}else{
    localStorage.setItem("countColorintalk",0);
}
count = localStorage.getItem("countColorintalk");
talkmode.addEventListener("click",()=>{
        if(count==1){
            count=0;
            day.style.display='none';
            night.style.display='block';
            out.style.background ="blue";
            In.style.background="black";
            localStorage.setItem("talkChange","day");
            localStorage.setItem("countColorintalk",count);
            chatbox.style.background = "white";
            bool=true;
        }
        else if(count==0){
            count=1;
            day.style.display='block';
            night.style.display='none';
            localStorage.setItem("talkChange","night");
            localStorage.setItem("countColorintalk",count);
            chatbox.style.background = "black";
            bool = false;
        }
        console.log(count);
})
if(localStorage.getItem("db_ic")===localStorage.getItem("outgoing_id")){
    if(localStorage.getItem("talkChange")=="day"){
        day.style.display='none';
        night.style.display='block';
        out.style.background ="black";
        In.style.background="blue";
        chatbox.style.background = "white"; 
    }
    else{
        day.style.display='block';
        night.style.display='none';
        out.style.background ="white";
        In.style.background="green";
        chatbox.style.background = "black";
    }
}
else{
    if(localStorage.getItem("talkChange")=="night"){
        day.style.display='none';
        night.style.display='block';
        chatbox.style.background = "black"; 
    }
    else{
        day.style.display='block';
        night.style.display='none';
        chatbox.style.background = "white";
    }
}