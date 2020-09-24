const formulario = document.getElementById("form-contacto");

const inputs = document.querySelectorAll(".main__contacto-input input");






let campos = {
    nombre: false,
    telefono: false,
    mail: false,
    mensaje: false,
    asunto: false
};

const expresiones = {
    dni: /^\d{7,8}$/,
    /* usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, */ // Letras, numeros, guion y guion_bajo
    nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
    password: /^.{4,12}$/, // 4 a 12 digitos.
    correo: /^\w+([\.]?\w+)*@\w+([\.]?\w+)*(\.\w{2,3})+$/ /* /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/ */ ,
    telefono: /^\d{7,14}$/, // 7 a 14 numeros.
    codigo: /^\d{4,6}$/, // 7 a 14 numeros.
};
inputs.forEach((input) => {
    input.addEventListener('keyup', validarCampo, false);
});


function validarCampo(e) {
    switch (e.target.name) {
        case "nombre":
            validar(expresiones.nombre, e.target.value, e.target.name);
            break;
        case "telefono":
            validar(expresiones.telefono, e.target.value, e.target.name);
            break;
        case "mail":
            validar(expresiones.correo, e.target.value, e.target.name);
            break;
        case "asunto":
            validar(expresiones.nombre, e.target.value, e.target.name);
            break;
    }
}

function validar(expresion, valor, campo) {
    if (expresion.test(valor)) {
        document.getElementById(`contacto_input-${campo}`).classList.remove('main__contacto-input-activo');
        campos[campo] = true;
    } else {
        document.getElementById(`contacto_input-${campo}`).classList.add('main__contacto-input-activo');
        campos[campo] = false;
    }
}

function checkMensaje() {
    if (document.getElementById('mensaje').value !== "") {
        document.getElementById(`contacto_input-mensaje`).classList.remove('main__contacto-input-activo');
        return true;
    } else {
        document.getElementById(`contacto_input-mensaje`).classList.add('main__contacto-input-activo');
        return false;
    }

}



formulario.addEventListener('submit', verificarForm);

function verificarForm(e) {

    if (campos.nombre && campos.mail && campos.telefono && campos.mail && checkMensaje()) {
        document.getElementById("main__contacto-mensaje-ok").classList.add('main__contacto-mensaje-ok-activo');
        document.getElementById("main__contacto-mensaje-error").classList.remove('main__contacto-mensaje-error-activo');
        formulario.reset();
        camposDefault();
        e.sub
    } else {
        e.preventDefault();
        document.getElementById("main__contacto-mensaje-error").classList.add('main__contacto-mensaje-error-activo');
        document.getElementById("main__contacto-mensaje-ok").classList.remove('main__contacto-mensaje-ok-activo');
    }
}



function camposDefault() {
    campos = {
        nombre: false,
        telefono: false,
        mail: false,
        mensaje: false,
        asunto: false
    };
}