<footer>

<div class="container-footer-all">

    <div class="container-body">

        <div class="colum1">
            <h1>Mas información de la Universidad</h1>

            <p style="text-align:center;font-size: 20px;">Misión.</p>
            <p style="text-align:justify"> Formar profesionistas competentes, con la finalidad que se integren
                al ámbito laboral que
                contribuyan al desarrollo tecnológico, social, cultural y económico de nuestro país; educándolos
                con Planes y Programas de Estudios acordes a las necesidades del sector productivo de la región.
            </p>

        </div>

        <div class="colum2">

            <h1>Redes Sociales</h1>

            <div class="row2">
                <img src="../img/facebook.png">
                <a href="https://www.facebook.com/Oficial-Universidad-Tecnol%C3%B3gica-de-Acapulco-1982044402027945"
                target="_blank" class="link-danger" style="color: #4481eb;">Siguenos en Facebook</a>
            </div>
            <div class="row2">
                <img src="../img/insta.png">
                <a href="https://www.instagram.com/utacapulco/" target="_blank" class="link-danger"
                    style="color: #4481eb;">Siguenos en
                    Instagram</a>
            </div>
            <div class="row2">
                <img src="../img/oficial.png">
                <a href="http://www.utacapulco.edu.mx/" target="_blank" class="link-danger" style="color: #4481eb;">Sitio
                    Oficial</a>
            </div>
        </div>

        <div class="colum3">

            <h1 style="  text-align: center;">Contacto</h1>

            <div class="row2">
                <img src="../img/house.png">
                <label>Av. Comandante Bouganville L-05, Fracc Costa Azul, Lomas de Costa Azul, 39830 Acapulco de
                    Juárez,
                    Gro.</label>
            </div>

            <div class="row2">
                <img src="../img/smartphone.png">
                <label>6 88 64 15</label>
            </div>

            <div class="row2">
                <img src="../img/contact.png">
                <label>universidad@utacapulco
                    .edu.mx</label>
            </div>

        </div>

    </div>

</div>

<div class="container-footer">
    <div class="footer">
        <div class="copyright">
            Todos los derechos reservados | © 2021 | <a href="">UTA</a>
        </div>

        <div class="information">
            <a href="">Informacion Compañia</a> | <a href="">Privacion y Politica</a> | <a href="">Terminos y
                Condiciones</a>
        </div>
    </div>

</div>

</footer>

<style>

footer{
    width: 100%;
    background: #202020;
    color: white;   
    
  }
  
  .container-footer-all{
    width: 100%;
    max-width: 1200px;
    margin: auto;
    padding: 40px;
  }
  
  .container-body{
    display: flex;
    justify-content: space-between;
  }
  
  .colum1{
    max-width: 400px;
  }
  
  .colum1 h1{
    font-size: 22px;
  }
  
  .colum1 p{
    font-size: 14px;
    color: #C7C7C7;
    margin-top: 20px;
  }
  
  .colum2{
    max-width: 400px;
    
  }
  
  .colum2 h1{
    font-size: 22px;
  }
  
  .row{
    margin-top: 20px;
    display: flex;
  }
  
  /*.row img{
    width: 36px;
    height: 36px;
  }*/
  
  .row label{
    margin-top: 10px;
    margin-left: 20px;
    color: #C7C7C7;
  }
  
  .colum3{
    max-width: 400px;
  }
  
  .colum3 h1{
    font-size: 22px;
  }
  
  .row2{
    margin-top: 20px;
    display: flex;
  }
  
  .row2 img{
    width: 36px;
    height: 36px;
  }
  
  .row2 label{
    margin-top: 10px;
    margin-left: 20px;
    max-width: 140px;
  }
  
  .container-footer{
    width: 100%;  
    background: #101010;
  }
  
  .footer{
    max-width: 1200px;
    margin: auto;
    display: flex;
    justify-content: space-between;  
    padding: 20px;
  }
  
  .copyright{
    color: #C7C7C7;
  }
  
  .copyright a{
    text-decoration: none;
    color: white;
    font-weight: bold;
  }
  
  .information a{
    text-decoration: none;
    color: #C7C7C7;
  }
  
  
  @media screen and (max-width: 1100px){
    
    .container-body{
        flex-wrap: wrap;
    }
    
    .colum1{
        max-width: 100%;
    }
    
    .colum2,
    .colum3{
        margin-top: 40px;
    }
  }
</style>