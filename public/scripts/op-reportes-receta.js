
const btnEdit = document.getElementById('btn-edit');
const btnVerCuadros = document.getElementById('btn-ver-cuadros');
const cantCajas = document.getElementsByClassName('moverCaja');
const varCajas = [];
const listSortable = [];

var toogleCuadros = true;
var toogleEdit = false;

const listNewNodes = [];

loadVarCajas();
loadSortable();


if(existKeyLocalStorage('reporte-receta')){
    loadNodesInList(getLocalStorage('reporte-receta'));
    clearNodesInPage(getGroupIdElementHijos())
    loadNewNodesInPage();
}

/* Local storage */
function addLocalStorage(nameData, data){
    localStorage.setItem(nameData, JSON.stringify(data));
}

function getLocalStorage(nameData){
    return JSON.parse(localStorage.getItem(nameData));
}

function loadNodesInList(listDataObjetivo){
    for(let i = 0; i < listDataObjetivo.length; i++){
        listAux = []
        for(let j = 0; j < listDataObjetivo[i].length; j++){
            if(listDataObjetivo[i][j] == -1){
                listAux.push(-1);
            }else{
                listAux.push(document.getElementById('content' + listDataObjetivo[i][j]))
            }
        }
        listNewNodes.push(listAux);
    }
}

function loadNewNodesInPage() {

    for(let i = 0; i < listNewNodes.length; i++){
        for(let j = 0; j < listNewNodes[i].length; j++){
            if(listNewNodes[i][j] != -1){
                varCajas[i].appendChild(listNewNodes[i][j]);
            }
        }
    }
}

function clearNodesInPage(listDataActual){

    for(let i = 0; i < listDataActual.length; i++){
        for(let j = 0; j < listDataActual[i].length; j++){
            if(listDataActual[i][j] != -1){
                var content = document.getElementById('content' + listDataActual[i][j]);
                varCajas[i].removeChild(content);
            }
        }
    }
    
}

/*Obtiene un arreglo de los arreglos de identificadores de los hijos de un nodo padre
*/
function getGroupIdElementHijos(){ 
    contentActual = [];
    for(let i = 0; i < varCajas.length; i++){
        if(tieneHijos(varCajas[i], 'P') || tieneHijos(varCajas[i], 'DIV'))
            contentActual.push(getIdElementHijos(varCajas[i]));
        else
            contentActual.push([-1])
    }
    return contentActual;
}


/*Verifica si un nodo padre tiene un hijo*/
function tieneHijos(elementPadre, etiqueta) {
    elementHijos = elementPadre.childNodes;
    for(let i = 0; i < elementHijos.length; i++){
        if(elementHijos[i].nodeName == etiqueta)
            return true;
    }
    return false;
}

/*Verifica si existe una clave en el localstorage */
function existKeyLocalStorage(nameKey){
    const name = localStorage.getItem(nameKey);
    if(name) return true;
    return false;
}

/*Obtiene un arreglo de identificadores de los hijos de un nodo padre */
function getIdElementHijos(elementPadre){

    var elementHijos = elementPadre.childNodes;
    var elementHijosResult = []

    for(let i = 0; i < elementHijos.length; i++){
        if(elementHijos[i].nodeName == 'P' || elementHijos[i].nodeName == 'DIV'){
            var elementId = elementHijos[i].id;
            elementHijosResult.push(parseInt(elementId.substr(elementId.length-1)));
        }
    }
    return elementHijosResult;
}
/* End Local storage*/

btnEdit.addEventListener('click', ()=>{

    if(toogleEdit){
        btnEdit.textContent = 'Editar';
        addLocalStorage('reporte-receta', getGroupIdElementHijos());
    }
    else{
        btnEdit.textContent = 'Guardar'
    }
    toogleSortable();
    toogleEdit = !toogleEdit; 
})

btnVerCuadros.addEventListener('click', () => {
    if(toogleCuadros)
        btnVerCuadros.textContent = "Deshabilitar cuadros";
    else
        btnVerCuadros.textContent = "Habilitar cuadros";
    loadCuadros();
    console.log(toogleCuadros);
})



/*Funciones auxiliares */
function loadVarCajas(){
    for(var i = 0; i < cantCajas.length; i++){
        varCajas.push(document.getElementById('moverCaja'+(i+1)))
    }
}

function loadCuadros() {
    for(var i = 0; i < cantCajas.length; i++){
        if(toogleCuadros)
            document.getElementById('moverCaja' + (i+1)).style.border = '1px solid blue';
        else
            document.getElementById('moverCaja' + (i+1)).style.border = 'none';
    }
    toogleCuadros = !toogleCuadros;
}

function loadSortable(){
    for(var i = 0; i < varCajas.length; i++){
        listSortable.push(
            Sortable.create(varCajas[i], {
                group: {
                    name: "cajas",
                    pull:true,
                    put: true
                },
                animation: 500,
                handle: '.moverCaja',
                chosenClass: 'active',
                disabled: true,
            })
        );
    }
}

function toogleSortable(){
    for(var i = 0; i < listSortable.length; i++){
        var estadoI = listSortable[i].option('disabled');
        listSortable[i].option('disabled', !estadoI);
        if(estadoI)
            document.getElementById('moverCaja'+(i+1)).style.cursor = 'move';
        else
            document.getElementById('moverCaja'+(i+1)).style.cursor = 'auto';
    }
}



/*Report to pdf*/
// btnPdf = document.getElementById('btn-pdf');

// btnPdf.addEventListener('click', ()=>{
//     const containerToPDF = document.getElementById('report-container'); // <-- Aquí puedes elegir cualquier elemento del DOM
//     html2pdf()
//         .set({
//             margin: 1,
//             filename: 'reporte.pdf',
//             image: {
//                 type: 'jpeg',
//                 quality: 0.98
//             },
//             html2canvas: {
//                 scale: 3, // A mayor escala, mejores gráficos, pero más peso
//                 letterRendering: true,
//             },
//             jsPDF: {
//                 unit: "in",
//                 format: "a3",
//                 orientation: 'portrait' // landscape o portrait
//             }
//         })
//         .from(containerToPDF)
//         .toPdf().get('pdf').then( function (pdf){
//             window.open(pdf.output('bloburl'), '_blank');
//         })
//         .catch(err => console.log(err));
// })