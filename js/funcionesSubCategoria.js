/*
en este apartado se encuentran todo lo que tiene que ver con el registro actualizacion
y eliminacion de categoria
*/
//mostrar datos
listarSubCategoria();

function listarSubCategoria() {
    fetch("../admin/tablaSubCategoria.php", {
        method: "POST"
    }).then(response => response.text()).then(response => {
        tbcate.innerHTML = response;
    });
}

//registrar datos form
registrosubcategoria.addEventListener("click", (e) => {
    e.preventDefault();
    const subcategoria = document.querySelector('#subcategoria').value;
    if(subcategoria === ''){
        sinboton("warning", "Campo nombre subcategoria esta vacio", "Debes llenar los campos para poder registrar");
        return false;
    }
    fetch("../bd/registroSubCategoria.php", {
        method: "POST",
        body: new FormData(formSubCategoria)
    }).then(response => response.json()).then(response => {
   
       if(response.respuesta === "vaciocat"){
           sinboton("warning", "Campo Categoria esta vacio" , "Debes seleccionar una categoria");
       }
       else if (response.respuesta === "correcto") {
            sinboton("success", response.NombreCategoria, "LA CATEGORIA SE INSERTO CORRECTAMENTE");
            listarSubCategoria();
            document.getElementById('formSubCategoria').reset();
        } else if (response.respuesta === "error") {
            sinboton("error", response.NombreCategoria, "EXISTION UN ERROR AL INSERTAR CATEGOIRA")
        } else if (response.respuesta === "existe") {
            document.getElementById('formSubCategoria').reset();
            sinboton("warning", response.NombreCategoria, "CATEGORIA EXISTE DEBE REGISTRAR UNA CATEGORIA NO REGISTRADA");
        }
 
    });
});
//eliminar Categoria
function eliminarSubcategoria(Id_Subcategoria) {
    //console.log(Id_Subcategoria);
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
            fetch("../bd/eliminarSubCategoria.php",{
                method:"POST",
                body: Id_Subcategoria
            }).then(response => response.json()).then(response=>{
                //console.log(response);
                if(response.respuesta=== "correcto"){
                    sinboton('success',response.iforma,'Eliminado correctamente');
                    listarSubCategoria();
                }else if(response.respuesta==="error"){
                    sinboton("warning",response.iforma,"La categoría no puede ser eliminada puesto que esta en uso");
                }
            });
        }
      })

}
//funciones apra edutar la Categoria
const myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
function editarSubcategoria(Id_Subcategoria) {
    //creamos la petucion fetch y trasmitimos los datos 
    fetch("../admin/tablaEditarSubCategoria.php", {
        method: "POST",
        body: Id_Subcategoria
    }).then(response => response.json()).then(response => {
        //console.log(response);
        //se concatena la respuesta del servidor trayendo el id y el nomrbe
        nomseje.innerHTML = 'La Categoria original a la que pertenece es: '+response.Cat;
        edSubcatenomgoria.value = response.Nombre;
        idSubcategoria.value = response.Id;
        myModal.show();
    })
}

EditSubCat.addEventListener("click", (e) => {
    e.preventDefault();
    const vacio = document.querySelector('#edSubcatenomgoria').value;
    if(vacio === ''){
        sinboton("warning", "Campo vacio", "Debes llenar los campos para poder registrar")
        return false;
    }
    fetch("../bd/editarSubCategoria.php", {
        method: "POST",
        body: new FormData(forEditSubCat)
    }).then(response => response.json()).then(response => {
        console.log(response);
        if (response.respuesta === "correcto") {
            sinboton("success",response.nombre,"Subcategoria Actualizada correctamente");
            listarSubCategoria();
            document.getElementById('forEditSubCat').reset();
            myModal.hide();
        } else if (response.respuesta === "error") {
            sinboton("error", response.nombre, "Error al actualizar Subcategoria");
            myModal.hide();
        }else if(response.respuesta === "vaciocat"){
            sinboton("warning", "Campo categoria esta vacio", "Debes seleccionar  una categoria");
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