window.onload = function() {
    document.getElementById("user").style.display ="none";
}

function a(){
    document.getElementById("adminuser").style.display ="block";
    document.getElementById("user").style.display ="none";
}
function u(){
    document.getElementById("adminuser").style.display ="none";
    document.getElementById("user").style.display ="block";
}
function au(){
    let adminuser = document.getElementById("adminuser");
    let user = document.getElementById("user");

    if(adminuser.style.display == "none" && user.style.display =="block")
    {
        a();
        document.getElementById("change").value = "Mostrar usuarios administradores";

    }else{

        u();
        document.getElementById("change").value = "Mostrar usuarios administradores";

    }


}