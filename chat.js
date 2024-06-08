let form = document.querySelector(".sendmsg");
let input_field = form.querySelector("#text");
let sendbtn =document.getElementById("click");
let chatbox =document.getElementById("chatBox");
form.onsubmit = (e)=>{
    e.preventDefault();
}
sendbtn.onclick = () =>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","php/insert-chat.php",true);
    xhr.onload =()=>{
         if(xhr.readyState==XMLHttpRequest.DONE){
            if(xhr.status==200){
                // let data = xhr.response;
                // console.log(data);
                input_field.value = "";
            }
         }
    }
    let fromData = new FormData(form);
    xhr.send(fromData);
}
setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","php/get-chat.php",true);
    xhr.onload =()=>{
         if(xhr.readyState==XMLHttpRequest.DONE){
            if(xhr.status==200){
                let data = xhr.response;
                chatbox.innerHTML = data;
            }
         }
    }
    let formData = new FormData(form);
    xhr.send(formData);
},500);