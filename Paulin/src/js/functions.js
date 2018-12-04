$(document).ready(function(){
    $(".close").click(function(){
        $("#alerta").hide();
    });
});

function login() {
    if (document.getElementById('mail').value != "" && document.getElementById('pass').value != "") {       
        var ajaxRequest;

        ajaxRequest = new XMLHttpRequest();

        ajaxRequest.onreadystatechange = function() {

            if(this.readyState == 4) {

                var hola = JSON.parse(this.responseText);
                console.log(hola);
                if (Object.keys(hola).length == 0) {
                    $('#alerta').show();
                }else{
                    if(hola[0].password == document.getElementById('pass').value){
                        alert("Bienvenido");
                        localStorage.setItem("correo",hola[0].correo);
                        window.location.assign("src/main.php");
                    }else{
                        $('#alerta').show();
                    }
                }
            }
        }
        var queryString = "?sent=logIn&valores=" + document.getElementById('mail').value;
        ajaxRequest.open("GET", "src/php/servicio/api.php" + queryString, true);
        ajaxRequest.send(null);
    }else{
        $('#alerta').show(); 
    }
}