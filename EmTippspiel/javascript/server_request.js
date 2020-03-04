function login_req(username, pwd){
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            document.getElementById("login_response").innerHTML = this.responseText;
        }
    }
    xhr.open('POST', '/EmTippspiel/PHP/user/login.php?name=' + username + "&pwd=" + pwd, true);
    xhr.send(null);
}

function register_req(username, pwd){
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
        if (xhr.readyState == XMLHttpRequest.DONE) {
            document.getElementById("register_response").innerHTML = this.responseText;
        }
    }
    xhr.open('POST', '/EmTippspiel/PHP/user/register.php?name=' + username + '&pwd=' + pwd, true);
    xhr.send(null);
}