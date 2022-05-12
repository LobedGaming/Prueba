window.onload = function(){cargarPrevisualizacion();} 

let navbar = document.getElementById('navbar-color');
navbar.onchange =  function(){
    let elem = document.getElementById('navbar-color').value;
    style.setProperty('--navbar-color', elem);
}
let backgroud = document.getElementById('bg-color');
backgroud.onchange =  function(){
    let elem = document.getElementById('bg-color').value;
    style.setProperty('--bg-color', elem);
}
let aside = document.getElementById('aside-color');
aside.onchange =  function(){
    let elem = document.getElementById('aside-color').value;
    style.setProperty('--aside-color', elem);
}
let textColor = document.getElementById('text-color');
textColor.onchange =  function(){
    let elem = document.getElementById('text-color').value;
    style.setProperty('--font-color', elem);
}
let textColorNav = document.getElementById('text-color-nav');
textColorNav.onchange =  function(){
    let elem = document.getElementById('text-color-nav').value;
    style.setProperty('--font-color-nav', elem);
}
let textColorAside = document.getElementById('text-color-aside');
textColorAside.onchange =  function(){
    let elem = document.getElementById('text-color-aside').value;
    style.setProperty('--font-color-aside', elem);
}
let textSize = document.getElementById('font-size');
textSize.onchange =  function(){
    let elem = document.getElementById('font-size').value;
    style.setProperty('--font-size', elem+"px");
}
const temaOscuro = {
    "bgColor":"#4a4a4a",
    "asideColor":"#4a4a4a",
    "navbarColor":"#000000",
    "fontColor":"#ffffff",
    "fontColorAside":"#ffffff",
    "fontColorNav":"#ffffff",
    "fontSize":"21",
}
const temaClaro = {
    "bgColor":"#ffffff",
    "asideColor":"#f5f5f5",
    "navbarColor":"#000000",
    "fontColor":"#000000",
    "fontColorAside":"#000000",
    "fontColorNav":"#ffffff",
    "fontSize":"21",
}
const temaClasico = {
    "bgColor":"#ffffff",
    "asideColor":"#ffffff",
    "navbarColor":"#6183f5",
    "fontColor":"#000000",
    "fontColorAside":"#080808",
    "fontColorNav":"#ffffff",
    "fontSize":"21",
}
let temas = document.getElementById('temas-rapidos');
temas.onchange =  function(){
    if(temas.value === "2")cambiarTema(temaOscuro);
    else if(temas.value === "1") cambiarTema(temaClaro);
    else if(temas.value === "3") cambiarTema(temaClasico);
}

let guardar = document.getElementById('btn-guardar');
guardar.onclick = function(){
    let personalizacion = {
        navbarColor: navbar.value,
        fontSize: textSize.value,
        fontColor: textColor.value,
        fontColorNav:textColorNav.value,
        fontColorAside:textColorAside.value,
        asideColor: aside.value,
        bgColor: backgroud.value,
    }
    localStorage.setItem("personalizacion", JSON.stringify(personalizacion));
    alert("Cambios guardados");
}
function cargarPrevisualizacion(){
    let personalizacion = JSON.parse(localStorage.getItem("personalizacion"));
    if(personalizacion){
        console.log("cargando")
        document.getElementById('navbar-color').value = personalizacion["navbarColor"];
        document.getElementById('bg-color').value =  personalizacion["bgColor"];
        document.getElementById('aside-color').value = personalizacion["asideColor"];
        document.getElementById('text-color').value = personalizacion["fontColor"];
        document.getElementById('text-color-nav').value = personalizacion["fontColorNav"];
        document.getElementById('text-color-aside').value = personalizacion["fontColorAside"];
        document.getElementById('font-size').value = personalizacion["fontSize"];
    }   
}
function cambiarTema(tema){
    style.setProperty('--bg-color', tema["bgColor"]);
    style.setProperty('--aside-color', tema["asideColor"]);
    style.setProperty('--navbar-color', tema["navbarColor"]);
    style.setProperty('--font-color', tema["fontColor"]);
    style.setProperty('--font-color-aside', tema["fontColorAside"]);
    style.setProperty('--font-color-nav', tema["fontColorNav"]);
    //style.setProperty('--font-size', tema["fontSize"]+"px");
    
    document.getElementById('bg-color').value =  tema["bgColor"];
    document.getElementById('aside-color').value = tema["asideColor"];
    document.getElementById('navbar-color').value = tema["navbarColor"];
    document.getElementById('text-color').value = tema["fontColor"];
    document.getElementById('text-color-aside').value = tema["fontColorAside"];
    document.getElementById('text-color-nav').value = tema["fontColorNav"];
    //document.getElementById('font-size').value = tema["fontSize"];
    
}