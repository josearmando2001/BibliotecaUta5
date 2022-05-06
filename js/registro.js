const formEv3 = document.getElementById('iniciar2');
const inputs3 = document.querySelectorAll('#iniciar2 input');
const expresiones3 = {
	correo2: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-_]+\.[a-zA-Z0-9-_.]+$/
}
const campos3 = {
  correo2: false
}

const validarForm3 = (e) => {
  switch (e.target.name) {
    case "correo2":
      validarCampo3(expresiones3.correo2, e.target, 'correo2');
      break;
  }
}
inputs3.forEach((input) => {
  input.addEventListener('keyup', validarForm3);
  input.addEventListener('blur', validarForm3);
});

const validarCampo3 = (expresion, input, campo) => {
  if (expresion.test(input.value)) {
    document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
    document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
    document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
    document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
    document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
    campos3[campo] = true;
  } else {
    document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
    document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
    document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
    document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
    document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
    campos3[campo] = false;
  }
}

