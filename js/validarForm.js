const formEv = document.getElementById('formLibro');
const inputs = document.querySelectorAll('#formLibro input');
const expresiones = {
    libro:  /^[a-zA-Z0-9À-ÿ\s]{8,25}$/, // Letras, numeros, guion y guion_bajo
    autor: /^[a-zA-ZÀ-ÿ\s-_,]{4,25}$/, // Letras y espacios, pueden llevar acentos.
    editorial: /^[a-zA-Z0-9À-ÿ\s-_,]{4,20}$/,
    descripcion: /^[a-zA-Z0-9À-ÿ\s-_.,]{40,50}$/,
    numeroPaginas:  /^\d{1,4}$/ // 7 a 14 numeros. 
}
const campos = {
	usuario: false,
	nombre: false,
	libro: false,
	editorial: false,
	descripcion: false,
	numeroPaginas: false,
}

const validarForm = (e) => {
    switch (e.target.name) {
        case "nombreLibro":
            validarCampo(expresiones.libro, e.target, 'nombre');      
        break;
        case "autor":
            validarCampo(expresiones.autor, e.target,'autor');
            break;
        case "editorial":
            validarCampo(expresiones.editorial, e.target,'editorial');
            break;
        case "descripcion":
            validarCampo(expresiones.descripcion, e.target,'descripcion');
            break;
        case "numeroPaginas":
            validarCampo(expresiones.numeroPaginas, e.target,'numeroPaginas');
            break;
    }
}
inputs.forEach((input) => {
    input.addEventListener('keyup', validarForm);
    input.addEventListener('blur', validarForm);
});
const validarCampo = (expresion, input, campo) => {
	if(expresion.test(input.value)){
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