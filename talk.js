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
                scroll();
            }
         }
    }
    let fromData = new FormData(form);
    xhr.send(fromData);
}
function scrollbuttom(){
 chatbox.onmouseenter=()=>{
    chatbox.scrollTop=chatbox.scrollHeight
}
chatbox.onmousemove= ()=>{
    chatbox.scrollTop=chatbox.scrollHeight;
}
chatbox.onmouseenter =()=>{
    chatbox.scrollTop = chatbox.scrollHeight;
}
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
                    check =0;
                }
            }
         }
    }
    let formData = new FormData(form);
    xhr.send(formData);
},700);
    function scroll(){
        chatbox.scrollTop=chatbox.scrollHeight;
        console.log("scroll");
    }
