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