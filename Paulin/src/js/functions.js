$(document).ready(function(){
    $(".close").click(function(){
        $("#alerta").hide();
    });
});

function login() {
    if (document.getElementById('mail').value != "" && document.getElementById('pass').value != "") {       
        window.location.assign("src/main.php");
    }else{
        $('#alerta').show(); 
    }
}