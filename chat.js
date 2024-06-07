const form = document.querySelector(".sendmsg");
const input_field = form.querySelector("#text");
const sendbtn  = form.querySelector("#click");
form.onsubmit = (e)=>{
    e.preventDefault();
}
sendbtn.onclick = () =>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","php/insert-chat.php",true);
    xhr.onload =()=>{
         if(xhr.readyState==XMLHttpRequest.DONE){
            if(xhr.status==200){
               
            }
         }
    }
    let fromData = new FormData(from);
    xhr.send(fromData);
}