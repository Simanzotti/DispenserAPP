function loginUsuario() {

    var done = 0;

    var username = document.login.uname.value;

    username = username.toLowerCase();

    var password = document.login.psw.value;

    password = password.toLowerCase();

    if (username == "adm" && password == "adm") {
       // window.location.href = "pages/home.php"; done = 1;
	    window.location.href = "pages/home.html"; done = 1;
    }

    if (username == "marcel" && password == "teste") {
        window.location = "http://www.google.com.br"; done = 1;
    }

    if (username == "marcos" && password == "rodola") {
        window.location = "http://www.google.com.br"; done = 1;
    }

    if (done == 0) {
        alert("Senha e/ou Usuário inválido.");
    }
}
