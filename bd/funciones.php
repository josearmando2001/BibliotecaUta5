<?php

#notificacion
function notificacionComun($tipo, $titulo, $texto, $ubicacion)
{
  echo "<script languaje='javascript'>
window.onload = function alerta(){
 Swal.fire({
 icon: '$tipo',
 title: '$titulo',
 text: '$texto',
 confirmButtonText: 'Aceptar'
}).then(function() {
    window.location = '$ubicacion';
});
}
</script>";
}
#beinvenida
function notifiDobleDireccion($titulo, $texto, $condicion, $direccionaAdmin, $direccionaEsta)
{
  echo "<script languaje='javascript'>
window.onload = function alerta(){
Swal.fire({
    title: '$titulo',
    text: '$texto',
    imageUrl: '../img/uta.png',
    imageWidth: 200,
    imageHeight: 200,
    confirmButtonText: 'Aceptar',
    imageAlt: 'Custom image',
  }).then(function() {
    if($condicion==1){
        window.location = '$direccionaAdmin';
      }else if($condicion==2){
        window.location = '$direccionaEsta'; 
      }    
});
}
</script>";
}
//una dirrecion
function notifiUnaDireccion($titulo, $texto, $dirige)
{
  echo "<script languaje='javascript'>
window.onload = function alerta(){
Swal.fire({
  title: '$titulo',
  text: '$texto',
  imageUrl: '../img/uta.png',
  imageWidth: 200,
  imageHeight: 200,
  imageAlt: 'Custom image',
}).then(function() {
      window.location = '$dirige';  
});
}
</script>";
}
//entrega pasada
function notificacionFooter($titulo, $text, $footer, $dirige)
{
  echo "<script languaje='javascript'>
        window.onload = function alerta(){
            Swal.fire({
                title: '$titulo',
                text: '$text',
                imageUrl: '../img/uta.png',
                imageWidth: 200,
                imageHeight: 200,
                imageAlt: 'Custom image',
                footer: '$footer'
              }).then(function() {
                window.location = '$dirige';
        });
        }
        </script>";
}
//fotte doble direcion
function notifotterDoble($titulo, $text, $footer, $condicion, $direccionaAdmin, $direccionaEsta)
{
  echo "<script languaje='javascript'>
        window.onload = function alerta(){
            Swal.fire({
                title: '$titulo',
                text: '$text',
                imageUrl: '../img/uta.png',
                imageWidth: 200,
                imageHeight: 200,
                imageAlt: 'Custom image',
                footer: '$footer'
              }).then(function() {
                if($condicion==1){
                  window.location = '$direccionaAdmin';
                }else if($condicion==2){
                  window.location = '$direccionaEsta'; 
                }    
        });
        }
        </script>";
}

