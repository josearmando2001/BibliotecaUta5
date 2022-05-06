registrousu.addEventListener("click", (e) => {
    e.preventDefault();
    const password = document.querySelector("#password").value,
        password2 = document.querySelector("#password2").value;
    if (password == '' && password2 == '') {
        not('warning', 'Los campos estan vacio');
        return false;
    } else if (password == '') {
        not('warning', 'El campo password esta vacio');
        return false;
    } else if (password2 == '') {
        not('warning', 'El campo confirma password esta vacio');
        return false;
    }
    if (!document.getElementById('check').checked) {
        not('info', 'Usted debe aceptar los terminos y condiciones');
        return false;;
    } 
    if (password === password2) {
        fetch("../bd/inscritoUta.php", {
            method: "POST",
            body: new FormData(formRegistro)
        }).then(resposne => resposne.json()).then(resposne => {
            console.log(resposne.respuesta);
            if(resposne.respuesta == 'existe'){
                alerta('info', resposne.tipo  + ' Usted ya se encuentra registrado','../index.php');
            }else if(resposne.respuesta == 'correcto'){
                alerta('success',resposne.tipo + ' Usted ha sido reistrado de forma correcta','../index.php' );
            }else if(resposne.respuesta == 'error'){
                alerta('error', resposne.tipo + ' lo sentimos no pudo ser registrado','../index.php' );
            }else if(resposne.respuesta == 'errorpas'){
                alerta('warning', resposne.tipo + ' lo sentimos contraseñas no coinciden');
                
            }
        })
    } else {
        not('warning', 'las passwords no coinciden');
        return false;
    }
})

function alerta(icono, texto, ir) {
    Swal.fire({
        icon: icono,
        title: texto,
        showConfirmButton: false,
        timer: 1500
    }).then(function () {
        window.location = ir;
    });
}

function not(icono, texto) {
    Swal.fire({
        icon: icono,
        title: texto,
        showConfirmButton: false,
        timer: 1500
    })
}