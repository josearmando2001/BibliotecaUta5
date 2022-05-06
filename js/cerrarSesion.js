cerrarsesion.addEventListener('click', function (e) {
   e.preventDefault();
})

function cerrarsesionus(neme) {
   Swal.fire({
      title: "¿Desea Cerrar sesion?",
      text: "Al cerrar sesion usted no podra tener acceso al contenido",
      icon: "question",
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: "Cancelar",
      confirmButtonText: "Cerrar sesion",
   }).then((result) => {
      if (result.isConfirmed) {
         fetch("../bd/cerrarSesion.php", {
            method: "POST",
            body: neme
         }).then(response => response.json()).then(response => {
            //console.log(response);
            //console.log(response.respuesta);
            if (response.sesion == 'cerrada') {
               alertfin('success', response.nombre + ' Su sesion fue cerrada')
            } else if (response.sesion == 'noexiste') {
               alertfin('warning', 'No existe sesion')
            }

         })
      }
   })
}

function alertfin(tipo, titulo) {
   Swal.fire({
      icon: tipo,
      title: titulo,
      showConfirmButton: false,
      timer: 1500
   }).then(function () {
      window.location = '../index.php'
   })
}