/*
en este apartado se encuentran todo lo que tiene que ver con el registro actualizacion
y eliminacion de tipos de usaurios
*/
function listarTipo() {
  //peticion a la base de datos para general una tabla
  fetch("../admin/tableTipo.php", {
    method: "POST"
  }).then(response => response.text()).then(response => {
    //convertir el php a html y anexarlo 
    tbtipo.innerHTML = response;
  })
}

//funtion para registrar un usuario
registroTipo.addEventListener("click", (e) => {
  e.preventDefault();
  const vacio = document.querySelector('#tipo').value;
  if (vacio === '') {
    sinboton("warning", "Campo vacio", "Debes llenar los campos para poder registrar");
   return false;
  }
  //reamos la peticion y enviamos todos los datos por post y el body concatena too con el id
  fetch("../bd/insertarTipo.php", {
    method: "POST",
    body: new FormData(formTipo)
  }).then(response => response.json()).then(
    response => {
      //console.log(response);
      if (response.respuesta === "correcto") {
        sinboton("success",response.NombreTipo, "TIPO REGISTRADO CORRECTAMENTE");
        listarTipo();
      } else if (response.respuesta === "error") {
        sinboton("error",response.NombreTipo, "EXISTIO UN PROBLEMA AL INSERTAR EL TIPO")
      } else if (response.respuesta === "existe") {
        sinboton("warning", response.NombreTipo, "Este Tipo de usuario ya existe");
      }
      formTipo.reset();
    })
});
//funcion para editar


const myModal = new bootstrap.Modal(document.getElementById('ModalTipo'));
function editarTipo(Id_Tipo) {
  //console.log(Id_Tipo);
  fetch("../admin/tablaEditarTipo.php", {
    method: "POST",
    body: Id_Tipo
  }).then(response => response.json()).then(response => {
    idTipo.value=response.id;
    editartiponame.value=response.nombre;
    myModal.show();
    console.log(response.respuesta);
    //se concatena la respuesta del servidor trayendo el id y el nomrbe
    
  })
}

EditTipo.addEventListener("click", (m)=>{
  m.preventDefault();
  const vacio = document.querySelector('#editartiponame').value;
  if(vacio === ''){
    sinboton("warning", "Campo vacio", "Debes llenar los campos para poder editar");
    return false;
  }
  fetch('../bd/editartipo.php',{
    method:'POST',
    body:new FormData(forEditTipo)
  }).then(response=>response.json()).then(response=>{
    console.log(response);
    if(response.respuesta === 'correcto'){
      sinboton('success',response.nombre,'Editado con exito');
      listarTipo();
      myModal.hide();
    }
    else if(response.respuesta === 'error'){
      sinboton('error',response.Error,'Error al editar')
    }
    else if(response.respuesta === 'existe'){
      sinboton('warning',response.nombre,'El tipo existe')
    }
  });
})


//eliminar un tipo 
function eliminartipo(Id_Tipo) {
  Swal.fire({
    title: "¿Desea eliminar?",
    text: "Al eliminar el Tipo de usuario podria afectar los registros",
    icon: "question",
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: "Cancelar",
    confirmButtonText: "Eliminar",
  }).then((result) => {
    if (result.isConfirmed) {
      //creamos la petucion fetch y trasmitimos los datos 
      fetch("../bd/eliminarTipo.php", {
        method: "POST",
        body: Id_Tipo
      }).then(response => response.json()).then(response => {
        //console.log(response);
        //console.log(response.respuesta);
        if (response.respuesta == "correcto") {
          Swal.fire({
            icon: 'success',
            title: 'Se Elimino de forma correcta',
            showConfirmButton: false,
            timer: 1500
          })
          listarTipo();
        } else if (response.respuesta == "error") {
          sinboton("error", "Error al elimianar", "El tipo de usuario no puede ser eliminado porque se encuentra en uso");
        }
      })

    }
  })
}
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