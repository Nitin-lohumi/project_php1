let show = document.getElementById("show");
let hided = document.getElementById("hided");
let Name = document.getElementById("name");
let password = document.getElementById("password");
let dob = document.getElementById("dob");
let gender =document.getElementById("gender");
let phone = document.getElementById("phone");
let yourProfile = document.getElementById("yourProfile");
let profileInfo = document.getElementById("profileInfo");
let edit = document.getElementById("edit");
let update = document.getElementById("update");
let update_heading= document.getElementById("update_heading");
let imgclick = document.getElementById("imgclick");
let img = document.getElementById("img");
let email = document.getElementById("email");
let nameclick = document.getElementById("nameclick");
let check =0;
Name.setAttribute('readonly', true);
password.setAttribute('readonly',true);
gender.setAttribute('readonly',true);
phone.setAttribute('readonly',true);
dob.setAttribute('readonly',true);
show.addEventListener("click",()=>{
    show.style.display="none";
    hided.style.display="block";
    password.type="text"
});
hided.addEventListener("click",()=>{
    show.style.display="block";
    hided.style.display="none";
    password.type="password";
})
yourProfile.addEventListener("click",()=>{
    if(check == 0){
        profileInfo.style.left="7px";
        profileInfo.style.transition="all .5s linear";
        check=1;
    }
    else{
        profileInfo.style.left="-400px";
        check =0;
    }
});
document.addEventListener("click",e=>{
 if(!profileInfo.contains(e.target)&&e.target!=yourProfile && e.target!=imgclick && 
 e.target!=nameclick && e.target!=img&&e.target!==phoneMenu){
    profileInfo.style.left="-400px";
    updated();
    check=0;
 }
});
// for mobile phone menu button
let phoneMenu = document.getElementById("menu_mobile");
phoneMenu.addEventListener("click",()=>{
    if(check == 0){
        profileInfo.style.left="0px";
        profileInfo.style.transition="all .5s linear";
        check=1;
    }
    else{
        profileInfo.style.left="-400px";
        check =0;
    }
});
// *******************************
edit.addEventListener("click",editing);
    function editing(){
    edit.style.display="hidden";
    update.style.display="block";
    Name.removeAttribute('readonly');
    password.removeAttribute('readonly');
    dob.removeAttribute('readonly');
    email.removeAttribute('readonly');
    gender.removeAttribute('readonly');
    phone.removeAttribute('readonly');
    profileInfo.style.background="white";
    Name.style.background="lightGrey";Name.style.padding = "8px 6px";
    password.style.background="lightGrey"; password.style.padding = "8px 6px";
    password.type="text";show.style.display="none";hided.style.display="none";
    dob.style.background="lightGrey"; dob.style.padding = "8px 6px";
    gender.style.background="lightGrey";gender.style.padding = "8px 6px";
    email.style.background="lightGrey";email.style.padding = "8px 6px";
    phone.style.background="lightGrey";phone.style.padding = "8px 6px";
    update_heading.innerHTML= "click to update button to set your profile update";
    document.getElementById("advice_logout").style.display="none";
    document.getElementById("logoutbtn").style.display="none";
}
update.addEventListener("click",updated());
function updated(){
    edit.style.display="block";
    update.style.display="none";
    profileInfo.style.background="transprent";
    Name.setAttribute('readonly', true);
   password.setAttribute('readonly',true);
   gender.setAttribute('readonly',true);
   email.setAttribute("readonly",true);
   phone.setAttribute('readonly',true);
   dob.setAttribute('readonly',true);
   password.type="password";
   Name.style.background="none";Name.style.padding = "0";
   password.style.background="none"; password.style.padding = "0";
   show.style.display="block"; hided.style.display="none";
   dob.style.background="none"; dob.style.padding = "0";
   gender.style.background="none";gender.style.padding = "0";
   email.style.background="none";email.style.padding = "0";
   phone.style.background="none";phone.style.padding = "0";
   document.getElementById("advice_logout").style.display="block";
   document.getElementById("logoutbtn").style.display="block";
   update_heading.style.display="none";
}