/**
    * @param String name
    * @return String
*/
function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}
var mostrar = getParameterByName('mostrar');
if(mostrar != ""){
    const elementoCRM = document.querySelector("#CRM");
    const elementoERP = document.querySelector("#ERP");
    const elementoDW = document.querySelector("#DW");
    const elementoMD = document.querySelector("#MD");
    const elementoTL = document.querySelector("#TL");
    const elementoEC = document.querySelector("#EC");
    const elementoER = document.querySelector("#ER");
    const elementoIC = document.querySelector("#IC");
    const elementoIM = document.querySelector("#IM");
    const elementoEQ = document.querySelector("#EQ");
    
    const parrafoCRM = document.querySelector("#parrafoCRM");
    const parrafoERP = document.querySelector("#parrafoERP");
    const parrafoDW = document.querySelector("#parrafoDW");
    const parrafoMD = document.querySelector("#parrafoMD");
    const parrafoTL = document.querySelector("#parrafoTL");
    const parrafoEC = document.querySelector("#parrafoEC");
    const parrafoER = document.querySelector("#parrafoER");
    const parrafoIC = document.querySelector("#parrafoIC");
    const parrafoIM = document.querySelector("#parrafoIM");
    const parrafoEQ = document.querySelector("#parrafoEQ");

    parrafoCRM.style.display = "none";
    parrafoERP.style.display = "none";
    parrafoDW.style.display = "none";
    parrafoMD.style.display = "none";
    parrafoTL.style.display = "none";
    parrafoEC.style.display = "none";
    parrafoER.style.display = "none";
    parrafoIC.style.display = "none";
    parrafoIM.style.display = "none";
    parrafoEQ.style.display = "none";

    elementoCRM.classList.remove('active');

    if(mostrar == "ERP"){
        parrafoERP.style.display = "block";
        elementoERP.classList.add('active');
    }else if(mostrar == "DW"){
        parrafoDW.style.display = "block";
        elementoDW.classList.add('active');
    }else if(mostrar == "MD"){
        parrafoMD.style.display = "block";
        elementoMD.classList.add('active');
    }else if(mostrar == "TL"){
        parrafoTL.style.display = "block";
        elementoTL.classList.add('active');
    }else if(mostrar == "EC"){
        parrafoEC.style.display = "block";
        elementoEC.classList.add('active');
    }else if(mostrar == "ERP"){
        parrafoERP.style.display = "block";
        elementoERP.classList.add('active');
    }else if(mostrar == "ER"){
        parrafoER.style.display = "block";
        elementoER.classList.add('active');
    }else if(mostrar == "IC"){
        parrafoIC.style.display = "block";
        elementoIC.classList.add('active');
    }else if(mostrar == "IM"){
        parrafoIM.style.display = "block";
        elementoIM.classList.add('active');
    }else if(mostrar == "EQ"){
        parrafoEQ.style.display = "block";
        elementoEQ.classList.add('active');
    }else{
        parrafoCRM.style.display = "block";
        elementoCRM.classList.add('active');
    }
    
}