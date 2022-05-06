function eliminarlib(Id_Libro) {
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
      fetch("../bd/eliminarLibro.php", {
        method: "POST",
        body: Id_Libro
      }).then(response => response.json()).then(response => {
        //console.log(response);
        //console.log(response.respuesta);
        if (response.respuesta == "correcto") {
            sinboton('success','Me elimino que dolor',' Eliminado')
        } else if (response.respuesta == "error") {
            sinboton('error','Error al eliminar',' Eliminado')
        }
      })
      }
    })
  }

  function sinboton(icon,titulo,cuerpo) {
    Swal.fire({
        icon: icon,
        title: titulo,
        text: cuerpo,
        showConfirmButton: false,
        timer: 1500
      }).then(function () {
        location.reload();
      });
  }
  function abrir(ir){
    window.open(ir, '_blank');
  }