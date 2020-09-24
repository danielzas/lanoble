let total = document.getElementById('total');
let entradaBuscar = document.getElementById('buscar');
let usuario = document.getElementById('usuario');
let puntos = document.getElementById('puntos'); //variable del campo donde se agregan los puntos que el cliente desea canjear
let canje = document.getElementById('canje');
let totalPagar = document.getElementById('totalPagar');
let cobrar = ""; //parámetro que se envia a la bbdd para actualizar los puntos del cliente. 
canje.disabled = true;
total.value = "";
entradaBuscar.value = "";
usuario.value = "";
puntos.value = "";
canje.value = "";
totalPagar.value = "";
totalPagar.disabled = true;

/**captuar el evento al realizar una busqueda de productos */
entradaBuscar.addEventListener('keyup', iniciar);

function iniciar(e) {
    e.preventDefault();
    let val = e.target.value;
    console.log(val);
    buscar(val);
}



function buscar(val) {

    conexion = new XMLHttpRequest();
    conexion.onreadystatechange = realizarBusqueda;
    conexion.open('GET', 'buscador.php?producto=' + val, true);
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




/***************************** */
/* evento click en el boton agregar */
document.getElementById('agregar').addEventListener('click', agregarLista);
document.getElementById('resultado').addEventListener('click', agregarLista2);
let precios = new Map();

/**boton agregar.Agrega el primero en la lista */
function agregarLista(e) {
    /**agregar primer dato a la lista**/
    let lista = document.getElementById('lista_seleccion');
    let fila = document.createElement('tr');
    /**seteo id fila para capturar el evento al hacer click en dicha fila, y esta se agregue a la lista de productos seleccionados */
    fila.setAttribute('id', 'fila');
    let dato = document.createElement('td');
    let nuevoDato = document.createTextNode(table.childNodes[1].childNodes[2].childNodes[0].textContent);
    dato.appendChild(nuevoDato);
    fila.appendChild(dato);
    lista.appendChild(fila);
    /*dato que contiene como hijo un inputs, donde el place holder tiene que tener el tipo de medida */
    let entrada = document.createElement('input');
    entrada.setAttribute('placeholder', table.childNodes[1].childNodes[2].childNodes[3].textContent);
    entrada.setAttribute('id', 'cantidad');
    entrada.setAttribute('type', 'text');
    dato = document.createElement('td');
    dato.appendChild(entrada);
    fila.appendChild(dato);
    lista.appendChild(fila);
    /**tercer dato, contiene una caja para guardar el subtotal, multiplciando la cantidad ingresada por el precio obtenido previamente.  */
    entrada = document.createElement('input');
    entrada.disabled = true;
    entrada.setAttribute('id', 'subtotal');

    precios.set(table.childNodes[1].childNodes[2].childNodes[0].textContent, table.childNodes[1].childNodes[2].childNodes[4].textContent);

    dato = document.createElement('td');
    dato.appendChild(entrada);
    fila.appendChild(dato);
    lista.appendChild(fila);
    /***********icon garbage************** */
    let iconGarbage = document.createElement('i');
    iconGarbage.setAttribute('class', 'far fa-trash-alt');
    iconGarbage.setAttribute('id', 'iconGarbage');
    iconGarbage.setAttribute('onclick', 'borrar(event)');
    dato = document.createElement('td');
    dato.appendChild(iconGarbage);
    fila.appendChild(dato);
    lista.appendChild(fila);

    /**limpiar caja de texto buscar */
    entradaBuscar.value = "";
}

/**agrega al listado a cualquier elemento al hacer click sobre este */
function agregarLista2(e) {
    /**agregar primer dato a la lista**/
    let lista = document.getElementById('lista_seleccion');
    let fila = document.createElement('tr');
    /**seteo id fila para capturar el evento al hacer click en dicha fila, y esta se agregue a la lista de productos seleccionados */
    fila.setAttribute('id', 'fila');
    let dato = document.createElement('td');
    let nuevoDato = document.createTextNode(e.target.parentNode.childNodes[0].textContent);
    dato.appendChild(nuevoDato);
    fila.appendChild(dato);
    lista.appendChild(fila);
    /*dato que contiene como hijo un inputs, donde el place holder tiene que tener el tipo de medida */
    let entrada = document.createElement('input');
    entrada.setAttribute('placeholder', e.target.parentNode.childNodes[3].textContent);
    entrada.setAttribute('id', 'cantidad');
    entrada.setAttribute('type', 'text');
    dato = document.createElement('td');
    dato.appendChild(entrada);
    fila.appendChild(dato);
    lista.appendChild(fila);
    /**tercer dato, contiene una caja para guardar el subtotal, multiplciando la cantidad ingresada por el precio obtenido previamente.  */
    entrada = document.createElement('input');
    entrada.disabled = true;
    entrada.setAttribute('id', 'subtotal');

    precios.set(e.target.parentNode.childNodes[0].textContent, e.target.parentNode.childNodes[4].textContent);

    dato = document.createElement('td');
    dato.appendChild(entrada);
    fila.appendChild(dato);
    lista.appendChild(fila);
    /***********icon garbage************** */
    let iconGarbage = document.createElement('i');
    iconGarbage.setAttribute('class', 'far fa-trash-alt');
    iconGarbage.setAttribute('id', 'iconGarbage');
    iconGarbage.setAttribute('onclick', 'borrar(event)');
    dato = document.createElement('td');
    dato.appendChild(iconGarbage);
    fila.appendChild(dato);
    lista.appendChild(fila);

    /**limpiar caja de texto buscar */
    document.getElementById('buscar').value = "";
}


/**capturar el evento keyup del input de la lista .Calcular el subtotal. **/
document.getElementById('lista_seleccion').addEventListener('keyup', (e) => {
    let producto = e.target.parentNode.previousSibling.firstChild.nodeValue;
    e.target.parentNode.nextSibling.firstChild.value = parseFloat(precios.get(producto) * e.target.value);
    calcularTotalPuntos();
});

function calcularTotalPuntos() {
    let arrSubtotal = document.querySelectorAll('#subtotal');
    let sum = 0;
    for (let i = 0; i < arrSubtotal.length; i++) {
        sum = parseFloat(sum) + parseFloat(arrSubtotal[i].value);
    }
    total.value = sum;
    puntos.value = total.value * 0.1;
    habilitarCanjear();
    calcularTotal()

}

/**si el campo total está seteado y se seleccionó un usuairo habilitar el campo canjear */
function habilitarCanjear() {
    if (total.value && document.getElementById('dni')) {
        canje.disabled = false;
    }
}

/**agregar el monto a cobrar en el campo total.Capturar el evento para llamar a la funcion calcular puntos */
total.addEventListener('keyup', (e) => {
    habilitarCanjear();
    calcularTotal()
});



/**capturar evento click icon garbara. Eliminar fila */

function borrar(e) {
    console.log(e.target.parentNode.parentNode.remove());
    calcularTotalPuntos();
}

/**disparar la busqueda del cliente en la bbdd */

usuario.addEventListener('keypress', (e) => {
    if (e.keyCode == 13) {
        iniciarBusqueda(e);
    }
});
/* iniciarBusqueda */

function iniciarBusqueda(e) {
    e.preventDefault();
    let val = e.target.value;
    buscarUsuario(val);
}

let conexion;

function buscarUsuario(val) {

    conexion = new XMLHttpRequest();
    conexion.onreadystatechange = mostrarBusqueda;
    conexion.open('GET', 'buscador.php?dni=' + val, true);
    conexion.send();
}

function mostrarBusqueda() {
    let mostrar = document.getElementById('usuario_info');
    if (conexion.readyState == 4) {
        mostrar.innerHTML = conexion.responseText;
        habilitarCanjear();
    } else {
        mostrar.innerHTML = "buscando";
    }
}


/**************evento keyup campo canjear.verificar si tengo los puntos que indico y si el mismo no supera el 50%****************/
document.getElementById('canje').addEventListener('keyup', (e) => {
    let no50 = (e.target.value <= 50) ? true : false;
    let dispone = (parseInt(e.target.value) <= parseInt(document.getElementById('puntosCliente').textContent)) ? true : false;
    if (no50 && dispone) {
        document.getElementById('canje').classList.remove('list__seleccionados-msjCanje-error');
        document.getElementById('canje').classList.add('list__seleccionados-msjCanje-ok');
        document.getElementById('msj_canje').classList.remove('list__seleccionados-msjCanje-texto-mostrar');
        calcularTotal();
    } else {
        document.getElementById('canje').classList.remove('list__seleccionados-msjCanje-ok');
        document.getElementById('canje').classList.add('list__seleccionados-msjCanje-error');
        document.getElementById('msj_canje').classList.add('list__seleccionados-msjCanje-texto-mostrar');
        calcularTotal();
    }
    if (e.target.value == "") {
        document.getElementById('canje').classList.remove('list__seleccionados-msjCanje-error');
        document.getElementById('msj_canje').classList.remove('list__seleccionados-msjCanje-texto-mostrar');
    }
});

/**capturar el evento click boton canjear */
document.getElementById('cobrar').addEventListener('click', (e) => {
    e.preventDefault;
    /* if (confirm(`Asignar ${puntos.value} puntos a ${document.getElementById('nombre')} ?`)) {

    } */

    iniciarProcesoCanjear(e);
});

function iniciarProcesoCanjear(e) {
    e.preventDefault();
    cobrar = 'user=' + document.getElementById('dni').textContent + '&puntosCanje=' + canje.value + '&puntos=' + puntos.value;
    canjear(cobrar);
}



function canjear(val) {

    conexion = new XMLHttpRequest();
    conexion.onreadystatechange = mostrarResultado;
    conexion.open('GET', 'buscador.php?' + val, true);
    conexion.send();
}

function mostrarResultado() {
    /* let mostrar = document.getElementById('msj_canje'); */
    if (conexion.readyState == 4) {
        alert(conexion.responseText);
        if (conexion.responseText.indexOf("Operacion Finalizada") === 0) {
            location.reload();
        }
    } else {
        if (conexion.readyState != 1 && conexion.readyState != 2 && conexion.readyState != 3) {
            alert("Error.No se pudo actualizar.");
        }
    }
}


/***********calcultar total a pagar************* */

function calcularTotal() {
    if (total.value && document.getElementById('dni')) {
        totalPagar.value = parseFloat(total.value) - parseFloat(total.value * (canje.value / 100));
        puntos.value = parseInt(totalPagar.value * 0.1);
    }
}