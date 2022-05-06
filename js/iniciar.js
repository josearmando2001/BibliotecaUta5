var entrar = document.getElementById('entrar');
entrar.addEventListener("click", (e) => {
    e.preventDefault();
    var response = grecaptcha.getResponse();
    //console.log(response);
    if(response.length !=0){
    enviar();    
    }else {
        alerta('warning', 'REALIZAR RECAPTCHA', 'ALGUNO DE LOS CAMPOS ESTA VACIO LLENA LOS CAMPOS PRIMERO');
        return false;
    }
});

function enviar(){
    const correo = document.querySelector('#correo').value,
        password = document.querySelector('#password').value;

    if (correo === '' || password === '') {
        alerta('warning', 'LOS DATOS ESTAN INCOMPLETOS', 'ALGUNO DE LOS CAMPOS ESTA VACIO LLENA LOS CAMPOS PRIMERO');
        return false;
    } else {
        fetch("bd/inisiosesion.php", {
            method: "POST",
            body: new FormData(iniciar)
        }).then(response => response.json()).then(response => {
            console.log(response.respuesta);
            if (response.respuesta === "contraBien") {
                document.getElementById('iniciar').reset();
                dobledirige(response.titulo, response.cuerpo, response.direccion, "admin/index.php", "php/index.php");
            } else if (response.respuesta === "contraMal") {
                alerta(response.alerta, response.titulo, response.cuerpo);
            } else if (response.respuesta === "NoExiste") {
                document.getElementById('iniciar').reset();
                alerta(response.alerta, response.titulo, response.cuerpo);
            } else if (response.respuesta === "bloqueo") {
                alerta(response.alerta, response.titulo, response.cuerpo);
            } else if (response.respuesta === "bloquenoti") {
                alerta(response.alerta, response.titulo, response.cuerpo);
            }
            document.querySelector('#password').value = "";
        });
    }
};


function alerta(tipo, titulo, cuerpo) {
    Swal.fire({
        icon: tipo,
        title: titulo,
        text: cuerpo,
        showConfirmButton: false,
        timer: 1500
    });
}

function uta(titulo, cuerpo) {
    Swal.fire({
        title: titulo,
        text: cuerpo,
        imageUrl: '../img/uta.png',
        imageWidth: 200,
        imageHeight: 200,
        imageAlt: 'Custom image',
        showConfirmButton: false,
        timer: 1500

    })
}

function dobledirige(titulo, cuerpo, dirige, admin, estandar) {
    Swal.fire({
        title: titulo,
        text: cuerpo,
        imageUrl: 'img/uta.png',
        imageWidth: 200,
        imageHeight: 200,
        confirmButtonText: 'Aceptar',
        imageAlt: 'Custom image',
        showConfirmButton: false,
        timer: 1500

    }).then(function () {
        if (dirige == 1) {
            window.location = admin;
        } else if (dirige == 2) {
            window.location = estandar;
        }

    });
}