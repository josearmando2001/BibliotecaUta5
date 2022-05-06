const formEv2 = document.getElementById('formRegistro');
const inputs2 = document.querySelectorAll('#formRegistro input');
const expresiones2 = {
    password: /^.{6,12}$/, // 8 a 12 digitos.
    password2: /^.{6,12}$/ // 8 a 12 digitos.
}
const campos2 = {
    password: false,
    password2: false
}

const validarForm2 = (e) => {
  switch (e.target.name) {
    case "password":
      validarCampo2(expresiones2.password, e.target, 'password');
      break;
      case "password2":
        validarCampo2(expresiones2.password2, e.target, 'password2');
        break;
  }
}
inputs2.forEach((input) => {
  input.addEventListener('keyup', validarForm2);
  input.addEventListener('blur', validarForm2);
});

const validarCampo2 = (expresion, input, campo) => {
  if (expresion.test(input.value)) {
    document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
    document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
    document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
    document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
    document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
    campos2[campo] = true;
  } else {
    document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
    document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
    document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
    document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
    document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
    campos2[campo] = false;
  }
}

const formEv3 = document.getElementById('formRegistro');
const inputs3 = document.querySelectorAll('#formRegistro input');
const expresiones3 = {
	correo2: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-_]+\.[a-zA-Z0-9-_.]+$/
}
const campos3 = {
  correo2: false
}

