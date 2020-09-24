const formulario = document.getElementById("formulario");
const inputs = document.querySelectorAll("#formulario .formulario__grupo-input input");



const expresiones = {
    dni: /^\d{7,8}$/,
    /* usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, */ // Letras, numeros, guion y guion_bajo
    nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
    password: /^.{6,12}$/, // 4 a 12 digitos.
    correo: /^\w+([\.]?\w+)*@\w+([\.]?\w+)*(\.\w{2,3})+$/ /* /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/ */ ,
    telefono: /^\d{10}$/, // 7 a 14 numeros.
    codigo: /^\d{3,6}$/, // 7 a 14 numeros.
};

let campos = {
    dni: false,
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
    console.log(fecha);
    if (fecha !== "") {
        document.getElementById('grupo_nacimiento').classList.add('formulario__grupo-ok');
        console.log('esto se ejecuto');
        campos["nacimiento"] = true;
    }

};

inputs.forEach((input) => input.addEventListener('keyup', (e) => {
        switch (e.target.name) {
            case "dni":
                validarCampo(expresiones.dni, e.target.value, e.target.name);
                break;
            case "nombre":
                validarCampo(expresiones.nombre, e.target.value, e.target.name);
                break;
            case "apellido":
                validarCampo(expresiones.nombre, e.target.value, e.target.name);
                break;
            case "password":
                validarCampo(expresiones.password, e.target.value, e.target.name);
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
            case "codigo":
                validarCampo(expresiones.codigo, e.target.value, e.target.name);
                break;
        }
    }

));

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
    console.log(campos);
    let cod = document.getElementById('codigo').value;
    if (campos.dni && campos.nombre && campos.apellido && campos.password && campos.nacimiento /* && validarSexo() */ && campos.celular && campos.email && (campos.codigo || cod === "")) {
        console.log('formulario enviado');
        document.getElementById('formulario__mensaje').classList.remove('formulario__mensaje-activo');
        inputs.forEach((input) => { document.getElementById(`grupo_${input.name}`).classList.remove('formulario__grupo-ok'); })
            /* formulario.reset(); */
        document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
        /* location.reload(); */
        /*  setTimeout(function() { location.reload(); }, 10000); */


    } else {
        document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
        e.preventDefault();
    }
    /* document.formulario.submit(); */
});


const validarSexo = () => {
    let sex = document.getElementById('sexo').value;
    console.log(sex);
    if (document.querySelector('input[name="sexo"]:checked')) {
        document.querySelector('#grupo_sexo .formulario__error').classList.remove('formulario__error-activo');
        return true;
    } else {
        document.querySelector('#grupo_sexo .formulario__error').classList.add('formulario__error-activo');
        return false;

    }

};

document.getElementById('dni').addEventListener('blur', checkDNI);
document.getElementById('codigo').addEventListener('blur', checkCodigo);

let name;

function checkDNI(e) {
    e.preventDefault();
    conectar(`php.search${String.fromCharCode(92)}checkDNI.php?dni=${e.target.value}`);
    name = e.target.name;
    console.log(name);
}

function checkCodigo(e) {
    if (e.target.value != "") {
        e.preventDefault();
        conectar(`php.search${String.fromCharCode(92)}checkCod.php?codigo=${e.target.value}`);
        name = e.target.name;
        console.log(name);
    }
}

var conexion;

function conectar(url) {
    conexion = new XMLHttpRequest();
    conexion.onreadystatechange = procesarEventos;
    conexion.open("GET", url, true);
    conexion.send();
}

function procesarEventos() {
    var msj = document.querySelector(`#grupo_${name} .formulario__error`);
    if (conexion.readyState == 4) {
        msj.innerHTML = conexion.responseText;
    } else {
        msj.innerHTML = 'Cargando...';
    }
}