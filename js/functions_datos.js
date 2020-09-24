window.addEventListener('load', cargarVariables);

function cargarVariables() {
    let inputs = document.querySelectorAll('#formulario .formulario__grupo .formulario__grupo-input input');
    inputs.forEach((input) => {
            console.log("ejecutado");
            switch (input.name) {
                case "nombre":
                    validarCampo(expresiones.nombre, input.value, input.name);
                    break;
                case "apellido":
                    validarCampo(expresiones.nombre, input.value, input.name);
                    break;
                case "password":
                    validarCampo(expresiones.password, input.value, input.name);
                    validarPassword();
                    break;
                case "password2":
                    validarPassword();
                    break;
                case "celular":
                    validarCampo(expresiones.telefono, input.value, input.name);
                    break;
                case "email":
                    validarCampo(expresiones.correo, input.value, input.name);
                    break;

                case "nacimiento":
                    validarNacimiento(input.value);
                    break;
            }
        }

    );

}
const formulario = document.getElementById("formulario");
const inputs = document.querySelectorAll("#formulario .formulario__grupo-input input");

/*Habilitar la edición del formulario */
document.getElementById('button__edit').addEventListener('click', () => {

        let i = document.getElementsByTagName('input');
        for (let x = 0; x < i.length; x++) {
            i[x].disabled = false;
        }
    })
    /************************************/

const expresiones = {
    nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
    password: /^.{0,12}$/, // 4 a 12 digitos.
    correo: /^\w+([\.]?\w+)*@\w+([\.]?\w+)*(\.\w{2,3})+$/ /* /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/ */ ,
    telefono: /^\d{10}$/, // 7 a 14 numeros.
};

let campos = {
    nombre: false,
    apellido: false,
    password: false,
    nacimiento: false,
    celular: false,
    sexo: false,
    email: false,
    codigo: false
};

const validarCampo = (expresion, valor, campo) => {
    if (expresion.test(valor)) {
        document.querySelector(`#grupo_${campo} .formulario__error`).classList.remove('formulario__error-activo');
        document.getElementById(`${campo}`).classList.remove('formulario__input-error');
        document.getElementById(`grupo_${campo}`).classList.remove('formulario__grupo-error');
        document.getElementById(`grupo_${campo}`).classList.add('formulario__grupo-ok');
        campos[campo] = true;

    } else {
        document.getElementById(`grupo_${campo}`).classList.add('formulario__grupo-error');
        document.getElementById(`${campo}`).classList.add('formulario__input-error');
        document.querySelector(`#grupo_${campo} .formulario__error`).classList.add('formulario__error-activo');
        document.getElementById(`grupo_${campo}`).classList.remove('formulario__grupo-ok');
        campos[campo] = false;
    }

};

const validarPassword = () => {
    if (document.getElementById('password').value !== document.getElementById('password2').value) {
        document.getElementById('grupo_password2').classList.add('formulario__grupo-error');
        document.getElementById('password2').classList.add('formulario__input-error');
        document.querySelector('#grupo_password2 .formulario__error').classList.add('formulario__error-activo');
        document.getElementById('grupo_password2').classList.remove('formulario__grupo-ok');
        campos['password'] = false;
    } else {
        document.getElementById('grupo_password2').classList.remove('formulario__grupo-error');
        document.getElementById('password2').classList.remove('formulario__input-error');
        document.querySelector('#grupo_password2 .formulario__error').classList.remove('formulario__error-activo');
        document.getElementById('grupo_password2').classList.add('formulario__grupo-ok');
        campos['password'] = true;
    }
};

const validarNacimiento = (fecha) => {
    if (fecha !== "") {
        document.getElementById('grupo_nacimiento').classList.add('formulario__grupo-ok');
        campos["nacimiento"] = true;
    }

};

inputs.forEach((input) => input.addEventListener('keyup', (e) => {
        switch (e.target.name) {
            case "nombre":
                validarCampo(expresiones.nombre, e.target.value, e.target.name);
                break;
            case "apellido":
                validarCampo(expresiones.nombre, e.target.value, e.target.name);
                break;
            case "password":
                validarCampoPass(expresiones.password, e.target.value, e.target.name);
                validarPassword();
                break;
            case "password2":
                validarPassword();
                break;
            case "celular":
                validarCampo(expresiones.telefono, e.target.value, e.target.name);
                break;
            case "email":
                validarCampo(expresiones.correo, e.target.value, e.target.name);
                break;
        }
    }

));

function validarCampoPass(expresion, valor, campo) {
    document.querySelector(`#grupo_${campo} .formulario__error`).classList.remove('formulario__error-activo');
    document.getElementById(`${campo}`).classList.remove('formulario__input-error');
    if (expresion.test(valor) && (valor.length > 5 || valor.length == '')) {
        document.getElementById(`grupo_${campo}`).classList.remove('formulario__grupo-error');
        document.getElementById(`grupo_${campo}`).classList.add('formulario__grupo-ok');
        campos[campo] = true;

    } else {
        document.getElementById(`grupo_${campo}`).classList.add('formulario__grupo-error');
        document.getElementById(`${campo}`).classList.add('formulario__input-error');
        document.querySelector(`#grupo_${campo} .formulario__error`).classList.add('formulario__error-activo');
        document.getElementById(`grupo_${campo}`).classList.remove('formulario__grupo-ok');
        campos[campo] = false;
    }

}
document.getElementById('nacimiento').addEventListener('blur', function(e) {
    if (e.target.value !== "") {
        document.getElementById('grupo_nacimiento').classList.add('formulario__grupo-ok');
        document.getElementById('grupo_nacimiento').classList.remove('formulario__grupo-error');
        document.getElementById('nacimiento').classList.remove('formulario__input-error');
        document.querySelector('#grupo_nacimiento .formulario__error').classList.remove('formulario__error-activo');
        campos.nacimiento = true;

    } else {
        document.getElementById('grupo_nacimiento').classList.add('formulario__grupo-error');
        document.getElementById('nacimiento').classList.add('formulario__input-error');
        document.querySelector('#grupo_nacimiento .formulario__error').classList.add('formulario__error-activo');
        campos.nacimiento = false;

    }
})



formulario.addEventListener('submit', (e) => {
    if (campos.nombre && campos.apellido && campos.password && campos.nacimiento && validarSexo() && campos.celular && campos.email) {
        console.log('formulario enviado');
        document.getElementById('formulario__mensaje').classList.remove('formulario__mensaje-activo');
        inputs.forEach((input) => { document.getElementById(`grupo_${input.name}`).classList.remove('formulario__grupo-ok'); })
        document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
        /* location.reload(); */



    } else {

        document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
        e.preventDefault();
    }

});


const validarSexo = () => {
    if (document.querySelector('input[name="sexo"]:checked')) {
        document.querySelector('#grupo_sexo .formulario__error').classList.remove('formulario__error-activo');
        return true;
    } else {
        document.querySelector('#grupo_sexo .formulario__error').classList.add('formulario__error-activo');
        return false;

    }

};