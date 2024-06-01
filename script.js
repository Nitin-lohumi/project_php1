let show = document.getElementById("show");
let hided = document.getElementById("hided");
let password = document.getElementById("password");
let yourProfile = document.getElementById("yourProfile");
let profileInfo = document.getElementById("profileInfo");
let check =0;
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
 if(!profileInfo.contains(e.target)&&e.target!==yourProfile){
    profileInfo.style.left="-400px";
    check=0;
 }
});