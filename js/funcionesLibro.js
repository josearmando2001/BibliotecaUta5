function validarimg(){
    let inputimg = document.getElementById('imgPortada'),
    archivoimg = inputimg.value,
    extpermiimg = /(.png|.PNG|.jpg|.JPG)$/i;
    if(!extpermiimg.exec(archivoimg)){
        document.getElementById(`grupo__img`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__img`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__img i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__img i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__img .formulario__input-error`).classList.add('formulario__input-error-activo');
        inputimg.value='';
        return false;
    }else{
        document.getElementById(`grupo__img`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__img`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__img i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__img i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__img .formulario__input-error`).classList.remove('formulario__input-error-activo');
    }
}
function validarpdf(){
    let inputpdf = document.getElementById('pdf'),
    archivopd = inputpdf.value,
    extpermi = /(.pdf|.PDF)$/i;
    if(!extpermi.exec(archivopd)){
        document.getElementById(`grupo__pdf`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__pdf`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__pdf i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__pdf i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__pdf .formulario__input-error`).classList.add('formulario__input-error-activo');
        inputpdf.value='';
        return false;
    }else{
        document.getElementById(`grupo__pdf`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__pdf`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__pdf i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__pdf i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__pdf .formulario__input-error`).classList.remove('formulario__input-error-activo');
    }
}
registraLibro.addEventListener("click", (e) => {
    e.preventDefault();
    const titulo = document.querySelector("#nombreLibro").value,
        autor = document.querySelector("#autor").value,
        imgPortada = document.querySelector("#imgPortada").value,
        pdf = document.querySelector("#pdf").value,
        editorial = document.querySelector("#editorial").value,
        descripcion = document.querySelector("#descripcion").value,
        numeroPaginas = document.querySelector("#numeroPaginas").value,
        Publicacion = document.querySelector("#Publicacion").value;
    if (titulo === '' && autor === '' && imgPortada === '' && pdf === '' && editorial === '' && descripcion === '' && numeroPaginas === '' && Publicacion === '') {
        alerta('warning', 'Campos estan vacios');
        return false;
    } else if (titulo === '') {
        alerta('warning', 'Campo titulo de libro esta vacio');
        return false;
    } else if (autor === '') {
        alerta('warning', 'Campo autor esta vacio');
        return false;
    } else if (imgPortada === '') {
        alerta('warning', 'Campo imagen esta vacio');
        return false;
    } else if (pdf === '') {
        alerta('warning', 'Campo arhivo Pdf esta vacio')
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

    fetch("../bd/registroLibro.php", {
        method: "POST",
        body: new FormData(formLibro)
    }).then(response => response.json()).then(response => {
        if (response.respuesta == 'correcto') {
            alerta('success', response.libro + ' registrado de forma correcta');
            document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
                icono.classList.remove('formulario__grupo-correcto');
            });
    
        } else if (response.respuesta == 'error') {
            alerta('error', 'Error al registrar libro ' + response.libro);
        } else if (response.respuesta == 'errorcatch') {
            alerta('error', 'Error al registrar libro ' + response.libro);
        }
        formLibro.reset();
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
// selecionar todo ctrol + } 