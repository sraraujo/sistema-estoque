function validateEmail(){

    let email = document.querySelector("#iemail").value;
    let confirmarEmail = document.querySelector("#iemail2").value;
    
    if ((email.length > 0 && confirmarEmail.length > 0) && (email != confirmarEmail)){
        
        document.getElementById("iemail").value = "";
        document.getElementById("iemail2").value = "";

        alert(`E-mails não coincidem, tente novamente!`);

    }
}

function validateSenha(){

    let senha = document.querySelector("#isenha").value;
    let confirmarSenha = document.querySelector("#isenha2").value;
    
    if ((senha.length > 0 && confirmarSenha.length > 0) && (senha != confirmarSenha)){
        
        document.getElementById("isenha").value = "";
        document.getElementById("isenha2").value = "";
        
        alert(`Senhas não coincidem, tente novamente!`);

    }
}