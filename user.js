let user_list = document.getElementById("userlist");

// let searchbar = document.getElementById("searchbar");
// let searchbtn = document.getElementById("searchbtn");
// searchbar.onkeyup = () =>{
//   let searchTerm = searchbar.value;
//   let xhr = new XMLHttpRequest();
//   xhr.open("POST","php/search.php",true);
//   xhr.onload =()=>{
//        if(xhr.readyState==XMLHttpRequest.DONE){
//           if(xhr.status==200){
//               let data = xhr.response;
//                console.log(data);
//           }
//        }
//   }
//   xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
//   xhr.send("searchTerm="+searchTerm);
// }
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