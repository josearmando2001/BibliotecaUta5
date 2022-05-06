sesioncerrar.addEventListener("click",(e)=>{
e.preventDefault();
fetch("../bd/cerrarSesion.php",
{
    method:"POST"
}
).then(response => response.text()).then(response=>{
    console.log(response);
});
});

const myModal = new bootstrap.Modal(document.getElementById('actionmodal'));

