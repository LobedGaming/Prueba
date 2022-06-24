
const btnEdit = document.getElementById('btn-edit');
const btnVerCuadros = document.getElementById('btn-ver-cuadros');
const cantCajas = document.getElementsByClassName('moverCaja');
const varCajas = [];
const listSortable = [];

var toogleCuadros = true;
var toogleEdit = false;


loadVarCajas();
loadSortable();

btnEdit.addEventListener('click', ()=>{

    if(toogleEdit){
        btnEdit.textContent = 'Editar';
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
btnPdf = document.getElementById('btn-pdf');

btnPdf.addEventListener('click', ()=>{
    const containerToPDF = document.getElementById('report-container'); // <-- Aquí puedes elegir cualquier elemento del DOM
    html2pdf()
        .set({
            margin: 1,
            filename: 'reporte.pdf',
            image: {
                type: 'jpeg',
                quality: 0.98
            },
            html2canvas: {
                scale: 3, // A mayor escala, mejores gráficos, pero más peso
                letterRendering: true,
            },
            jsPDF: {
                unit: "in",
                format: "a3",
                orientation: 'portrait' // landscape o portrait
            }
        })
        .from(containerToPDF)
        .toPdf().get('pdf').then( function (pdf){
            window.open(pdf.output('bloburl'), '_blank');
        })
        .catch(err => console.log(err));
})