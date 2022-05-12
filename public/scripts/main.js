const style = document.documentElement.style;

cargarPersonalizacion();
function cargarPersonalizacion(){
    let personalizacion = JSON.parse(localStorage.getItem("personalizacion"));
    if(personalizacion){
        style.setProperty('--navbar-color', personalizacion["navbarColor"]);
        style.setProperty('--bg-color', personalizacion["bgColor"]);
        style.setProperty('--aside-color', personalizacion["asideColor"]);
        style.setProperty('--font-color', personalizacion["fontColor"]);
        style.setProperty('--font-color-nav', personalizacion["fontColorNav"]);
        style.setProperty('--font-color-aside', personalizacion["fontColorAside"]);
        style.setProperty('--font-size', personalizacion["fontSize"]+"px");
    }else{
        let personalizacion = {
            navbarColor: "#6183f5",
            fontSize: "21",
            fontColor: "#000000",
            fontColorNav:"#ffffff",
            fontColorAside:"#080808",
            asideColor: "#ffffff",
            bgColor: "#ffffff",
        }
        localStorage.setItem("personalizacion", JSON.stringify(personalizacion));
    }    
}

