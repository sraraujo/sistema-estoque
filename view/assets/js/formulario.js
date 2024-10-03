function validateEmail(){

    let email = document.querySelector("#iemail1").value;
    let confirmarEmail = document.querySelector("#iemail2").value;
    
    if ((email.length > 0 && confirmarEmail.length > 0) && (email != confirmarEmail)){
        
        document.getElementById("iemail1").value = "";
        document.getElementById("iemail2").value = "";

        alert(`E-mails não coincidem, tente novamente!`);

    }
}

function validateSenha(){

    let senha = document.querySelector("#isenha").value;
    let confirmarSenha = document.querySelector("#senha2").value;
    
    if ((senha.length > 0 && confirmarSenha.length > 0) && (senha != confirmarSenha)){
        
        document.getElementById("isenha").value = "";
        document.getElementById("senha2").value = "";
        
        alert(`Senhas não coincidem, tente novamente!`);

    }
}

function validarPreco(){

    let compra = document.querySelector("#precoCompra").value.replace(",", ".");
    let venda = document.querySelector("#precoVenda").value.replace(",", ".");

    if(compra.length > 0 && venda.length > 0 && parseFloat(compra) >= parseFloat(venda)){
        
        window.alert("[ ERRO ] - O valor de venda deve ser maior que o valor de compra, tente novamente!");
        document.getElementById("precoCompra").value = "";
        document.getElementById("precoVenda").value = "";
    }
}