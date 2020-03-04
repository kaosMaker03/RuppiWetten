function login_req(username, pwd){
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            document.getElementById("login_response").innerHTML = this.responseText;
            
            document.getElementById("username").value = "";
            document.getElementById("pwd").value = "";

            if(this.responseText == 'Login Valid !'){
                window.open("/EmTippspiel/HTML/games.html", "_self");
            }
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
            
            document.getElementById("username").value = "";
            document.getElementById("pwd").value = "";
        }
    }
    xhr.open('POST', '/EmTippspiel/PHP/user/register.php?name=' + username + '&pwd=' + pwd, true);
    xhr.send(null);
}

function games_req(){
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
        if(xhr.readyState == XMLHttpRequest.DONE){
            document.getElementById("games").innerHTML = this.responseText;
        }
    }
    xhr.open('GET', '/Emtippspiel/PHP/games/show_games.php', true);
    xhr.send(null);
}
