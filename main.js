function checkSubmit() {

    const cargo = document.querySelector("#cargo");
    const area = document.querySelector("#area");
    const table = document.querySelector(".table");
    const call = !(cargo.value == "selecione" || area.value == "selecione");


    if(!call) {
        table.parentNode.removeChild(table);
        alert("Selecione um elemento válido");
    }
    return call;

}

const btn = document.querySelector("#submit-btn").addEventListener("click",()=> {

    

});