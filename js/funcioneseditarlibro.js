editarLibro.addEventListener("click", (e) => {
    e.preventDefault();
    const titulo = document.querySelector("#nombreLibro").value,
        autor = document.querySelector("#autor").value,
        editorial = document.querySelector("#editorial").value,
        descripcion = document.querySelector("#descripcion").value,
        numeroPaginas = document.querySelector("#numeroPaginas").value,
        Publicacion = document.querySelector("#Publicacion").value;
    if (titulo === '' && autor === '' && editorial === '' && descripcion === '' && numeroPaginas === '' && Publicacion === '') {
        alerta('warning', 'Campos estan vacios');
        return false;
    } else if (titulo === '') {
        alerta('warning', 'Campo titulo de libro esta vacio');
        return false;
    } else if (autor === '') {
        alerta('warning', 'Campo autor esta vacio');
        return false;
    } else if (editorial === '') {
        alerta('warning', 'Campo editorial esta vacio')
        return false;
    } else if (descripcion === '') {
        alerta('warning', 'Campo descripcion esta vacio')
        return false;
    } else if (numeroPaginas === '') {
        alerta('warning', 'Campo numero de paginas esta vacio')
        return false;
    } else if (Publicacion === '') {
        alerta('warning', 'Campo año de publicacion esta vacio')
        return false;
    }
    fetch("../bd/editarLibro.php", {
        method: "POST",
        body: new FormData(formEditLibro)
    }).then(response => response.json()).then(response => {
        if (response.respuesta == 'catvacio') {
            alerta('warning', 'Seleccionar Categoria')
        } else if (response.respuesta == 'correcto') {
            corre('success', response.libro + ' Se actualizo de forma correcta')
            document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
                icono.classList.remove('formulario__grupo-correcto');
            });
        } else if (response.respuesta == 'error') {
            alerta('error', 'Error al actualizar libro ' + response.libro);
        } else if (response.respuesta == 'errorcatch') {
            alerta('error', 'Error al actualizar libro ' + response.libro);
        }
    });
});

function alerta(icon, titulo) {
    Swal.fire({
        icon: icon,
        title: titulo,
        showConfirmButton: false,
        timer: 1500
    })
}
function corre(icon, titulo) {
    Swal.fire({
        icon: icon,
        title: titulo,
        showConfirmButton: false,
        timer: 1500
    }).then(function () {
        Swal.fire({
            title: '¿Qué desea realizar?',
            showDenyButton: true,
            closeOnClickOutside: false,
            allowOutsideClick: false,
            showCancelButton: false,
            confirmButtonText: `index`,
            denyButtonText: `cerrar`,
          }).then((result) => {
            if (result.isConfirmed) {
                window.location = 'index.php'
            } else if (result.isDenied) {
              window.close();
            }
          })
     });
}