/*
en este apartado se encuentran todo lo que tiene que ver con el registro actualizacion
y eliminacion de categoria
*/
//mostrar datos
listarCategoria();

function listarCategoria() {
    fetch("../admin/tablaCategoria.php", {
        method: "POST"
    }).then(response => response.text()).then(response => {
        tbcate.innerHTML = response;
    });
}

//registrar datos form
registrocategoria.addEventListener("click", (e) => {
    e.preventDefault();
    const vacio = document.querySelector('#categoria').value;
    if(vacio === ''){
        sinboton("warning", "Campo vacio", "Debes llenar los campos para poder registrar");
        return false;
    }
    fetch("../bd/registroCategoria.php", {
        method: "POST",
        body: new FormData(formCategoria)
    }).then(response => response.json()).then(response => {
        //console.log(response);
        if (response.respuesta === "correcto") {
            sinboton("success", response.NombreCategoria, "LA CATEGORIA SE INSERTO CORRECTAMENTE");
            document.getElementById('formCategoria').reset();
            listarCategoria();
        } else if (response.respuesta === "error") {
            sinboton("error", response.NombreCategoria, "EXISTION UN ERROR AL INSERTAR CATEGORIA")
        } else if (response.respuesta === "existe") {
            // console.log(response.NombreCategoria);
            document.getElementById('formCategoria').reset();
            sinboton("warning", response.NombreCategoria, "CATEGORIA EXISTE DEBE REGISTRAR UNA CATEGORIA NO REGISTRADA");
        }
    });
});
//eliminar Categoria
function eliminarcategoria(Id_Categoria) {
    //console.log(Id_Categoria);
    Swal.fire({
        title: '¿Desea eliminar?',
        text: "Al eliminar Categoría puede afectar el funcionamiento de la aplicacion",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: "Cancelar",
        confirmButtonText: 'Eliminar'
      }).then((result) => {
        if (result.isConfirmed) {
            fetch("../bd/eliminarCategoria.php",{
                method:"POST",
                body: Id_Categoria
            }).then(response => response.json()).then(response=>{
                //console.log(response);
                if(response.respuesta=== "correcto"){
                    sinboton('success',response.iforma,'Eliminado correctamente');
                    listarCategoria();
                }else if(response.respuesta==="error"){
                    sinboton("warning",response.iforma,"La categoría no puede ser eliminada puesto que esta en uso");
                }
            });
        }
      })

}

//funciones apra edutar la Categoria
const myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
function editarcategoria(Id_Categoria) {
    //creamos la petucion fetch y trasmitimos los datos 
    fetch("../admin/tablaEditarCategoria.php", {
        method: "POST",
        body: Id_Categoria
    }).then(response => response.json()).then(response => {
        //console.log(response);
        //se concatena la respuesta del servidor trayendo el id y el nomrbe
        edcatenomgoria.value = response.Nombre;
        idcategoria.value = response.Id;
        myModal.show();
    })
}

EditCat.addEventListener("click", (e) => {
    e.preventDefault();
    const vacio = document.querySelector('#edcatenomgoria').value;
    if(vacio === ''){
        sinboton("warning", "Campo vacio", "Debes llenar los campos para poder registrar")
        exit;
    }
    fetch("../bd/editarCategoria.php", {
        method: "POST",
        body: new FormData(forEditCat)
    }).then(response => response.json()).then(response => {
        //console.log(response);
        if (response.respuesta === "correcto") {
            sinboton("success",response.nombre,"Categoría Actualizada correctamente");
            myModal.hide();
            listarCategoria();
        } else if (response.respuesta === "error") {
            sinboton("error", response.nombre, "Error al actualizar Categoría");
            myModal.hide();
        }else if(response.respuesta === "existe"){
            sinboton("warning", response.nombre, "Categoría Existente");
        }
    });
});
/*
en este apartado se encuentran todo lo que tiene que ver con las funciones
*/
function alerta(tipo, titulo, cuerpo) {
    Swal.fire({
        icon: tipo,
        title: titulo,
        text: cuerpo,
        timer: 1500
    });
}
function sinboton(icon,titulo,cuerpo) {
    Swal.fire({
        icon: icon,
        title: titulo,
        text: cuerpo,
        showConfirmButton: false,
        timer: 1500
      })
}
function uta(titulo, cuerpo) {
    Swal.fire({
        title: titulo,
        text: cuerpo,
        imageUrl: '../img/uta.png',
        imageWidth: 200,
        imageHeight: 200,
        imageAlt: 'Custom image',
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
        timer: 1500
    }).then(function () {
        if (dirige == 1) {
            window.location = admin;
        } else if (dirige == 2) {
            window.location = estandar;
        }

    });
}

function alertpreunta(titulo, cuerpo, icono, dirige) {
    Swal.fire({
        title: titulo,
        text: cuerpo,
        icon: icono,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: "Cancelar",
        confirmButtonText: 'Aceptar'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = dirige;
        }
    })
}