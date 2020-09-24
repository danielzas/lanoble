addEventListener('load', cargarDatos);

let conexion;
let datos;
let campos = {
    codigo: '',
    nombre: '',
    precio: '',
    descripcion: '',
    medida: '',
    tipo: ''
};
let campoBuscar = document.getElementById('buscar');
campoBuscar.value = '';
let tdCheck; //guardar elemento donde se habilito la edidiocn de los campos, para luego de guardar los cambios, elimine los atributos i y class. 


const selecTipo = document.getElementById('selectTipo');
/* let nuevaFila = "<tr><td id='codigo' name='codigo'></td><td><input type='text' id='nombre' value=''></td><td><input type='text' id='descripcion' value=''></td><td><select onchange='cambiarTipo(event)' id='tipo'><option></option></select></td><td><select id='medida'><option></option></select></td><td><input type='text' id='precio' value=''></td><td><i class='far fa-trash-alt' id='iconGarbage' onclick='eliminar(event)'></i></td><td><i class='fas fa-edit' id='iconEdit' onclick='habilitar(event)'></i></td><td><i class='far fa-check-square' id='iconEdit' onclick='guardar(event)'></i></td></tr>"; */



/**captuar el evento al realizar una busqueda de productos */
campoBuscar.addEventListener('keyup', iniciar);

function iniciar(e) {
    e.preventDefault();
    let val = encodeURIComponent(e.target.value);
    buscar(val);
}



function buscar(val) {

    conexion = new XMLHttpRequest();
    conexion.onreadystatechange = realizarBusqueda;
    conexion.open('POST', 'php.includes/productos.php?producto=' + val, true);
    conexion.send();
}

function realizarBusqueda() {
    let mostrar = document.getElementById('resultado');
    if (conexion.readyState == 4) {
        mostrar.innerHTML = conexion.responseText;
    } else {
        mostrar.innerHTML = "buscando";
    }
}


/**evento eliminar**/



function eliminar(e) {
    e.preventDefault;
    let nombreProducto = e.target.parentNode.parentNode.childNodes[3].childNodes[0].value;
    let codigo = e.target.parentNode.parentNode.childNodes[1].childNodes[0].textContent;
    if (confirm("Está seguro de eliminar " + nombreProducto + "?")) {
        buscarEliminarProducto(codigo);
    } else {
        console.log('acción cancelada.');
    }
}


function buscarEliminarProducto(codigo) {
    conexion = new XMLHttpRequest();
    conexion.onreadystatechange = mostrarResultado;
    conexion.open('GET', 'php.includes/productos.php?codigo=' + codigo, true);
    conexion.send();
}

function mostrarResultado() {
    let mostrar = document.getElementById('mensajes');
    if (conexion.readyState == 4) {
        mostrar.innerHTML = conexion.responseText;
    } else {
        mostrar.innerHTML = "procesando";
    }
}


/***************evento editar **********************/
function habilitar(e) {
    console.log("entraste a editar");
    let fila = e.target.parentNode.parentNode.childNodes;
    campos['codigo'] = fila[1].textContent; //guardo el codigo a editar en el objeto. 
    let i = 3;
    while (i < 12) {
        if (fila[i].nodeType == 1) {
            console.log('eeee' + fila[i].childNodes[0].value);
            fila[i].childNodes[0].disabled = false;
            campos[fila[i].childNodes[0].id] = fila[i].childNodes[0].value; //guardar los valores actuales en el objeto.
            if (fila[i].childNodes[0].id == "tipo") {
                /*recorrer el objeto dato*/
                for (const dato in datos) {
                    console.log(`${datos[dato]}`);
                    let nuevaOpcion = document.createElement('option');
                    nuevaOpcion.setAttribute('value', `${datos[dato]}`);
                    if (fila[i].childNodes[0].value == `${datos[dato]}`) {
                        nuevaOpcion.selected = true;
                    }
                    nuevaOpcion.innerHTML = `${datos[dato]}`;
                    fila[i].childNodes[0].appendChild(nuevaOpcion);
                }
                /*********************************/
            }

        }
        i++;
    }
    let insertarCheck = document.createElement('i');
    insertarCheck.setAttribute('class', "far fa-check-square");
    insertarCheck.setAttribute('onclick', "guardarCambios(event)");
    insertarCheck.setAttribute('id', 'iconCheck');
    fila[17].appendChild(insertarCheck);
    tdCheck = fila[17];
    editarCampos(fila);
}






function editarCampos(fila) {
    let i = 3;
    while (i < 12) {
        if (fila[i].nodeType == 1) {
            fila[i].childNodes[0].addEventListener('keyup', (e) => {
                campos[e.target.id] = e.target.value; //edito los valores que quiero, si no logro editar algun campo, anteriormente ya los guarde en el objeto. 
            });
        }
        i++;
    }

}


/**************evento load******/

function cargarDatos() {
    conexion = new XMLHttpRequest();
    conexion.onreadystatechange = procesar;
    conexion.open('GET', 'php.includes/productos.php?options=1', true);
    conexion.send();
}

function procesar() {
    let resultados = document.getElementById("resultados");
    if (conexion.readyState == 4) {
        datos = JSON.parse(conexion.responseText);
        cargarSelect();
    }
}


function cambiarTipo(event) {
    campos['tipo'] = event.target.value;
}

/**evento guardar cambios***/

function guardarCambios(e) {
    e.preventDefault;
    if (confirm('Desea guardar los cambios?')) {
        nuevosDatos = JSON.stringify(campos);
        conexion = new XMLHttpRequest();
        conexion.onreadystatechange = finalizarCambios;
        conexion.open('GET', 'php.includes/productos.php?datos=' + nuevosDatos, true);
        conexion.send(null);
    }
}

function finalizarCambios(e) {
    mostrar = document.getElementById('mensajes');
    if (conexion.readyState == 4) {
        mostrar.innerHTML = conexion.responseText;
        alert("Cambios guardados Correctamente.");
        /* location.reload(); */
        /*  campoBuscar.value = ""; */
        tdCheck.childNodes[0].remove();
    } else {
        mostrar.innerHTML = "procesando";
    }
}

/*******evento guardar nuevo dato */

function guardar(e) {
    console.log("guardaste");
}


/********agregar una nueva fila************/
/* document.getElementById('btnAgregar').addEventListener('click', () => {
    document.getElementById('nuevoProducto').innerHTML = nuevaFila;
}); */


function cargarSelect() {

    let select = document.getElementById('selectTipo');

    for (const dato in datos) {
        nuevaOpcion = document.createElement('option');
        nuevaOpcion.setAttribute('value', `${datos[dato]}`);
        nuevaOpcion.innerHTML = `${datos[dato]}`;
        select.appendChild(nuevaOpcion);
    }
}


/************evento submit************ */

document.getElementById('submit').addEventListener('click', (e) => {
    e.preventDefault();
    console.log('entraste');
    enviarFormulario();
});

function retornarDatos() {
    let nuevoProducto = '';
    let nombre = document.getElementById('nombreN').value;
    let descripcion = document.getElementById('descripcionN').value;
    let tipo = document.getElementById('selectTipo').value;
    let medida = document.getElementById('medidaN').value;
    let precio = document.getElementById('precioN').value;



    nuevoProducto = 'nombre=' + encodeURIComponent(nombre) + '&descripcion=' + encodeURIComponent(descripcion) + '&tipo=' + encodeURIComponent(tipo) + '&medida=' + encodeURIComponent(medida) + '&precio=' + encodeURIComponent(precio);
    return nuevoProducto;
}

function enviarFormulario() {
    conexion = new XMLHttpRequest();
    conexion.onreadystatechange = finalizarEnvio;
    conexion.open('POST', 'php.includes/productos.php', true);
    conexion.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    conexion.send(retornarDatos());
}

function finalizarEnvio() {
    var resultados = document.getElementById("mensaje_form");
    if (conexion.readyState == 4) {
        resultados.innerHTML = conexion.responseText;
        limpiarCampos();

    } else {
        resultados.innerHTML = 'Procesando...';
    }
}

function limpiarCampos() {
    document.getElementById('nombreN').value = '';
    document.getElementById('descripcionN').value = '';
    document.getElementById('selectTipo').value = document.getElementById('selectTipo').childNodes[1].value;
    document.getElementById('medidaN').value = document.getElementById('medidaN').childNodes[1].value;
    document.getElementById('precioN').value = '';
}