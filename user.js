let user_list = document.getElementById("userlist");
setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET","php/users.php",true);
    xhr.onload =()=>{
         if(xhr.readyState==XMLHttpRequest.DONE){
            if(xhr.status==200){
                let data = xhr.response;
                user_list.innerHTML = data;
            }
         }
    }
    xhr.send();
},500);