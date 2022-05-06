
const formEv = document.getElementById('formsolicitud');
const inputs = document.querySelectorAll('#formsolicitud input');
const expresiones = {
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-_]+\.[a-zA-Z0-9-_.]+$/
}
const campos = {
  correo: false
}

const validarForm = (e) => {
  switch (e.target.name) {
    case "correo":
      validarCampo(expresiones.correo, e.target, 'correo');
      break;
  }
}
inputs.forEach((input) => {
  input.addEventListener('keyup', validarForm);
  input.addEventListener('blur', validarForm);
});

const validarCampo = (expresion, input, campo) => {
  if (expresion.test(input.value)) {
    document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
    document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
    document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
    document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
    document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
    campos[campo] = true;
  } else {
    document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
    document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
    document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
    document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
    document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
    campos[campo] = false;
  }
}