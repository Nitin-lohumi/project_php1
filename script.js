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

//  mode -----  night or day mode  ..   

// let cover = document.getElementById("body");
let mode  =  document.getElementById("mode");
let day =  document.getElementById("day");
let night  = document.getElementById("night");
let store = localStorage.getItem("change");
let menu_mobile = document.getElementById("menu_mobile");
let talkbody = document.getElementById("talkbody");

let click=0;
let bool= true;
localStorage.setItem("click",1);
click = localStorage.getItem("click");
mode.addEventListener("click",()=>{
        if(click==1){
            click=0;
            day.style.display='none';
            night.style.display='block';
            yourProfile.style.background="linear-gradient(90deg, rgb(236, 182, 182) 0%, rgba(146, 235, 207, 0.377) 22%, rgb(77, 168, 186) 95%, rgb(32, 179, 209) 100%)";
            yourProfile.style.color="white";
            localStorage.setItem("change","day");
            localStorage.setItem("click",click);
            ChangeBg("white","black");
            menu_mobile.style.color="black";
            bool = true;
        }
        else if(click==0){
            click=1;
            day.style.display='block';
            night.style.display='none';
            yourProfile.style.background="linear-gradient(90deg, rgba(36, 254, 203, 0.906) 0%, rgba(102, 254, 219, 0.721) 22%, rgb(30, 40, 42) 95%, rgb(21, 63, 72) 100%)";
            localStorage.setItem("change","night");
            localStorage.setItem("click",click);
            menu_mobile.style.color="white";
            ChangeBg("black","white");
            bool = false;
        }
        console.log(click);
})
if(localStorage.getItem("change")=="day"){
    day.style.display='none';
    night.style.display='block';
    ChangeBg("white","black");
    menu_mobile.style.color="black";
    document.body.style.background = "white";
}
else{
    day.style.display='block';
    night.style.display='none';
    ChangeBg("black","white");
    menu_mobile.style.color="white";
    document.body.style.background = "black";
}
// console.log(store);
function ChangeBg(color,text){
    document.body.style.background = color; 
    yourProfile.style.color=text;
}
if(!bool){
    localStorage.setItem("click",1);
}