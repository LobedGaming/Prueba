
var listCheckItem = document.getElementsByClassName("checkItem");
var listItemBody = document.getElementsByClassName("itemBody");

document.getElementById("btn-pdf").addEventListener("click", ()=> {
    hiddenCheck();
})

document.getElementById("refresh").addEventListener("click", () => {
    location.reload();
})

document.getElementById("btnCheck").addEventListener("click", ()=>{
    removeNotSelected();
})


function removeNotSelected() {
    
    for(let i = 0; i < listCheckItem.length; i++){
        if(isSelected(listCheckItem[i])){
            console.log(listCheckItem[i].id)
            document.getElementsByClassName("th" + listCheckItem[i].id)[0].style.display = "none";
            hideAllItemColum("tb" + listCheckItem[i].id);
        }
    }
}

function hiddenCheck(){ 
    for(let i = 0; i < listCheckItem.length; i++){
        listCheckItem[i].style.display = "none";
    }   
}

function hideAllItemColum(nameClass){
    var listItemColum =  document.getElementsByClassName(nameClass);
    for(let i = 0; i < listItemColum.length; i++){
        listItemColum[i].style.display = "none";
    }
}

function isSelected(item){
    if (item.checked == 1) return true;
    return false;
}