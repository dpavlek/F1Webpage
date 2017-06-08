function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

var user = getCookie("user");
var birth = getCookie("user_birth");
var sex = getCookie("user_sex");

if(user != ""){
    document.getElementById("welcome_message").innerHTML = user;
    $('#blog').unbind('click');
    document.getElementById("login").innerHTML = "Logout";
}
else{
    document.getElementById("login").innerHTML = "Login";
    $('#blog').bind('click', function(e){
        e.preventDefault();
})
}