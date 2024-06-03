function validateForm(){
    let name=document.getElementById('name');
    let email=document.getElementById('email');
    let message=document.getElementById('message');
    if(name.value!=""&& email.value!="" && message.value!=""){
        return false;
    }
    else{
        alert("message sent to next line of code");
        SendMail();
        return true;
    }
}
function SendMail(){
    let person ={
        name: document.getElementById('name').value,
        email: document.getElementById('email').value,
        message : document.getElementById('message').value
    }
    emailjs.send("service_lsyz11k","template_dlzo9ob",person).then(alert("thanku ! " + document.getElementById('name').value + " for send feedback"));
    if(emailjs){
    document.getElementById('name').value="";
    document.getElementById('email').value="";
    document.getElementById('message').value="";
    }
}
let check =0;
let menuClick = document.getElementById("menuClick");
let showMenu = document.getElementById("showMenu");
menuClick.addEventListener("click",()=>{
if(check==0){
showMenu.style.left="25%";
check=1;
}
else{
    showMenu.style.left="150%";
    check=0;
}
});
document.addEventListener("click",e=>{
    if(!showMenu.contains(e.target)&&e.target!==menuClick){
       showMenu.style.left="110%";
    //    setTimeout(() => {
    //        document.location.reload();
    //      }, 700);
       check=0;
    }
   });