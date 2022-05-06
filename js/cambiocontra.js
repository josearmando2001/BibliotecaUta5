const container = document.querySelector(".container");
conbioctr.addEventListener("click", (e) => {
    e.preventDefault();
    const correo = document.getElementById('correo').value,
        terminsoli = document.getElementById('terminsoli').checked;
    if (correo === '' && terminsoli === false) {
        alerta('warning', 'Datos incompletos', 'Complete los campos correctamente');
        return false;
    } else if (terminsoli === false) {
        alerta('error', 'Aceptar Terminos', 'Complete los campos correctamente');
        return false;
    } else if (correo === '') {
        alerta('error', 'Datos incompletos', 'Complete los campos correctamente');
        return false;
    }
    fetch("../bd/solicontra.php", {
        method: "POST",
        body: new FormData(formsolicitud)
    }).then(response => response.json()).then(response => {
        if(response.respuesta=="correcto"){
            alerta1("success",`El codigo fue enviado`,`A ${response.mensaje}, ${response.nombre} el tiempo de virificacion es de 2 min`);
        }else if(response.respuesta=="error"){
            alerta('warning','error','Se produjo un error intentelo nievamente');
        document.getElementById('formsolicitud').reset();
        }
    });
});
function alerta1(tipo, titulo, cuerpo) {
    Swal.fire({
        icon: tipo,
        title: titulo,
        text: cuerpo,
        showConfirmButton: false,
        timer: 3000
    });
}
function alerta(tipo, titulo, cuerpo) {
    Swal.fire({
        icon: tipo,
        title: titulo,
        text: cuerpo,
        showConfirmButton: false,
        timer: 2000
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