document.addEventListener('DOMContentLoaded', function () {
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

    if (document.querySelector("#CRM.active")) {
        parrafoERP.style.display = "none";
        parrafoDW.style.display = "none";
        parrafoMD.style.display = "none";
        parrafoTL.style.display = "none";
        parrafoEC.style.display = "none";
        parrafoER.style.display = "none";
        parrafoIC.style.display = "none";
        parrafoIM.style.display = "none";
        parrafoEQ.style.display = "none";
    }

    
    elementoCRM.addEventListener("click", () => {
        if (!document.querySelector("#CRM.active")) {
            ocultarElementos(parrafoCRM, parrafoERP, parrafoDW, parrafoDW, parrafoMD,
                parrafoTL, parrafoEC, parrafoER, parrafoIC, parrafoIM, parrafoEQ)
            parrafoCRM.style.display = "block";
            parrafoEQ.style.display = "none";
            if (document.querySelector("#ERP.active")) {
                elementoERP.classList.remove('active');
            }else if(document.querySelector("#DW.active")){
                elementoDW.classList.remove('active');
            }else if(document.querySelector("#MD.active")){
                elementoMD.classList.remove('active');
            }else if(document.querySelector("#TL.active")){
                elementoTL.classList.remove('active');
            }else if(document.querySelector("#EC.active")){
                elementoEC.classList.remove('active');
            }else if(document.querySelector("#ER.active")){
                elementoER.classList.remove('active');
            }else if(document.querySelector("#IC.active")){
                elementoIC.classList.remove('active');
            }else if(document.querySelector("#IM.active")){
                elementoIM.classList.remove('active');
            }else if(document.querySelector("#EQ.active")){
                elementoEQ.classList.remove('active');
            }
            elementoCRM.classList.add('active');
        }
        
    });

    
    elementoERP.addEventListener("click", () => {
        if (!document.querySelector("#ERP.active")) {
            ocultarElementos(parrafoCRM, parrafoERP, parrafoDW, parrafoMD,
                parrafoTL, parrafoEC, parrafoER, parrafoIC, parrafoIM, parrafoEQ)
                parrafoERP.style.display = "block";
            if (document.querySelector("#CRM.active")) {
                elementoCRM.classList.remove('active');
            }else if(document.querySelector("#DW.active")){
                elementoDW.classList.remove('active');
            }else if(document.querySelector("#MD.active")){
                elementoMD.classList.remove('active');
            }else if(document.querySelector("#TL.active")){
                elementoTL.classList.remove('active');
            }else if(document.querySelector("#EC.active")){
                elementoEC.classList.remove('active');
            }else if(document.querySelector("#ER.active")){
                elementoER.classList.remove('active');
            }else if(document.querySelector("#IC.active")){
                elementoIC.classList.remove('active');
            }else if(document.querySelector("#IM.active")){
                elementoIM.classList.remove('active');
            }else if(document.querySelector("#EQ.active")){
                elementoEQ.classList.remove('active');
            }
            elementoERP.classList.add('active');
        }
    });

    elementoDW.addEventListener("click", () => {
        if (!document.querySelector("#DW.active")) {
            ocultarElementos(parrafoCRM, parrafoERP, parrafoDW, parrafoMD,
                parrafoTL, parrafoEC, parrafoER, parrafoIC, parrafoIM, parrafoEQ)
            parrafoDW.style.display = "block";
            if (document.querySelector("#CRM.active")) {
                elementoCRM.classList.remove('active');
            }else if(document.querySelector("#ERP.active")){
                elementoERP.classList.remove('active');
            }else if(document.querySelector("#MD.active")){
                elementoMD.classList.remove('active');
            }else if(document.querySelector("#TL.active")){
                elementoTL.classList.remove('active');
            }else if(document.querySelector("#EC.active")){
                elementoEC.classList.remove('active');
            }else if(document.querySelector("#ER.active")){
                elementoER.classList.remove('active');
            }else if(document.querySelector("#IC.active")){
                elementoIC.classList.remove('active');
            }else if(document.querySelector("#IM.active")){
                elementoIM.classList.remove('active');
            }else if(document.querySelector("#EQ.active")){
                elementoEQ.classList.remove('active');
            }
            elementoDW.classList.add('active');
        }
    });

    elementoMD.addEventListener("click", () => {
        if (!document.querySelector("#MD.active")) {
            ocultarElementos(parrafoCRM, parrafoERP, parrafoDW, parrafoMD,
                parrafoTL, parrafoEC, parrafoER, parrafoIC, parrafoIM, parrafoEQ)
            parrafoMD.style.display = "block";
            if (document.querySelector("#CRM.active")) {
                elementoCRM.classList.remove('active');
            }else if(document.querySelector("#ERP.active")){
                elementoERP.classList.remove('active');
            }else if(document.querySelector("#DW.active")){
                elementoDW.classList.remove('active');
            }else if(document.querySelector("#TL.active")){
                elementoTL.classList.remove('active');
            }else if(document.querySelector("#EC.active")){
                elementoEC.classList.remove('active');
            }else if(document.querySelector("#ER.active")){
                elementoER.classList.remove('active');
            }else if(document.querySelector("#IC.active")){
                elementoIC.classList.remove('active');
            }else if(document.querySelector("#IM.active")){
                elementoIM.classList.remove('active');
            }else if(document.querySelector("#EQ.active")){
                elementoEQ.classList.remove('active');
            }
            elementoMD.classList.add('active');
        }
    });
    
    elementoTL.addEventListener("click", () => {
        if (!document.querySelector("#TL.active")) {
            ocultarElementos(parrafoCRM, parrafoERP, parrafoDW, parrafoMD,
                parrafoTL, parrafoEC, parrafoER, parrafoIC, parrafoIM, parrafoEQ)
            parrafoTL.style.display = "block";
            if (document.querySelector("#CRM.active")) {
                elementoCRM.classList.remove('active');
            }else if(document.querySelector("#ERP.active")){
                elementoERP.classList.remove('active');
            }else if(document.querySelector("#DW.active")){
                elementoDW.classList.remove('active');
            }else if(document.querySelector("#MD.active")){
                elementoMD.classList.remove('active');
            }else if(document.querySelector("#EC.active")){
                elementoEC.classList.remove('active');
            }else if(document.querySelector("#ER.active")){
                elementoER.classList.remove('active');
            }else if(document.querySelector("#IC.active")){
                elementoIC.classList.remove('active');
            }else if(document.querySelector("#IM.active")){
                elementoIM.classList.remove('active');
            }else if(document.querySelector("#EQ.active")){
                elementoEQ.classList.remove('active');
            }
            elementoTL.classList.add('active');
        }
    });

    elementoEC.addEventListener("click", () => {
        if (!document.querySelector("#EC.active")) {
            ocultarElementos(parrafoCRM, parrafoERP, parrafoDW, parrafoMD,
                parrafoTL, parrafoEC, parrafoER, parrafoIC, parrafoIM, parrafoEQ)
            parrafoEC.style.display = "block";
            if (document.querySelector("#CRM.active")) {
                elementoCRM.classList.remove('active');
            }else if(document.querySelector("#ERP.active")){
                elementoERP.classList.remove('active');
            }else if(document.querySelector("#DW.active")){
                elementoDW.classList.remove('active');
            }else if(document.querySelector("#MD.active")){
                elementoMD.classList.remove('active');
            }else if(document.querySelector("#TL.active")){
                elementoTL.classList.remove('active');
            }else if(document.querySelector("#ER.active")){
                elementoER.classList.remove('active');
            }else if(document.querySelector("#IC.active")){
                elementoIC.classList.remove('active');
            }else if(document.querySelector("#IM.active")){
                elementoIM.classList.remove('active');
            }else if(document.querySelector("#EQ.active")){
                elementoEQ.classList.remove('active');
            }
            elementoEC.classList.add('active');
        }
    });

    elementoER.addEventListener("click", () => {
        if (!document.querySelector("#ER.active")) {
            ocultarElementos(parrafoCRM, parrafoERP, parrafoDW, parrafoMD,
                parrafoTL, parrafoEC, parrafoER, parrafoIC, parrafoIM, parrafoEQ)
            parrafoER.style.display = "block";
            if (document.querySelector("#CRM.active")) {
                elementoCRM.classList.remove('active');
            }else if(document.querySelector("#ERP.active")){
                elementoERP.classList.remove('active');
            }else if(document.querySelector("#DW.active")){
                elementoDW.classList.remove('active');
            }else if(document.querySelector("#MD.active")){
                elementoMD.classList.remove('active');
            }else if(document.querySelector("#TL.active")){
                elementoTL.classList.remove('active');
            }else if(document.querySelector("#EC.active")){
                elementoEC.classList.remove('active');
            }else if(document.querySelector("#IC.active")){
                elementoIC.classList.remove('active');
            }else if(document.querySelector("#IM.active")){
                elementoIM.classList.remove('active');
            }else if(document.querySelector("#EQ.active")){
                elementoEQ.classList.remove('active');
            }
            elementoER.classList.add('active');
        }
    });

    elementoIC.addEventListener("click", () => {
        if (!document.querySelector("#IC.active")) {
            ocultarElementos(parrafoCRM, parrafoERP, parrafoDW, parrafoMD,
                parrafoTL, parrafoEC, parrafoER, parrafoIC, parrafoIM, parrafoEQ)
            parrafoIC.style.display = "block";
            if (document.querySelector("#CRM.active")) {
                elementoCRM.classList.remove('active');
            }else if(document.querySelector("#ERP.active")){
                elementoERP.classList.remove('active');
            }else if(document.querySelector("#DW.active")){
                elementoDW.classList.remove('active');
            }else if(document.querySelector("#MD.active")){
                elementoMD.classList.remove('active');
            }else if(document.querySelector("#TL.active")){
                elementoTL.classList.remove('active');
            }else if(document.querySelector("#EC.active")){
                elementoEC.classList.remove('active');
            }else if(document.querySelector("#ER.active")){
                elementoER.classList.remove('active');
            }else if(document.querySelector("#IM.active")){
                elementoIM.classList.remove('active');
            }else if(document.querySelector("#EQ.active")){
                elementoEQ.classList.remove('active');
            }
            elementoIC.classList.add('active');
        }
    });

    elementoIM.addEventListener("click", () => {
        if (!document.querySelector("#IM.active")) {
            ocultarElementos(parrafoCRM, parrafoERP, parrafoDW, parrafoMD,
                parrafoTL, parrafoEC, parrafoER, parrafoIC, parrafoIM, parrafoEQ)
            parrafoIM.style.display = "block";
            if (document.querySelector("#CRM.active")) {
                elementoCRM.classList.remove('active');
            }else if(document.querySelector("#ERP.active")){
                elementoERP.classList.remove('active');
            }else if(document.querySelector("#DW.active")){
                elementoDW.classList.remove('active');
            }else if(document.querySelector("#MD.active")){
                elementoMD.classList.remove('active');
            }else if(document.querySelector("#TL.active")){
                elementoTL.classList.remove('active');
            }else if(document.querySelector("#EC.active")){
                elementoEC.classList.remove('active');
            }else if(document.querySelector("#ER.active")){
                elementoER.classList.remove('active');
            }else if(document.querySelector("#IC.active")){
                elementoIC.classList.remove('active');
            }else if(document.querySelector("#EQ.active")){
                elementoEQ.classList.remove('active');
            }
            elementoIM.classList.add('active');
        }
    });

    elementoEQ.addEventListener("click", () => {
        if (!document.querySelector("#EQ.active")) {
            ocultarElementos(parrafoCRM, parrafoERP, parrafoDW, parrafoMD,
                parrafoTL, parrafoEC, parrafoER, parrafoIC, parrafoIM, parrafoEQ)
            parrafoEQ.style.display = "block";
            if (document.querySelector("#CRM.active")) {
                elementoCRM.classList.remove('active');
            }else if(document.querySelector("#ERP.active")){
                elementoERP.classList.remove('active');
            }else if(document.querySelector("#DW.active")){
                elementoDW.classList.remove('active');
            }else if(document.querySelector("#MD.active")){
                elementoMD.classList.remove('active');
            }else if(document.querySelector("#TL.active")){
                elementoTL.classList.remove('active');
            }else if(document.querySelector("#EC.active")){
                elementoEC.classList.remove('active');
            }else if(document.querySelector("#ER.active")){
                elementoER.classList.remove('active');
            }else if(document.querySelector("#IC.active")){
                elementoIC.classList.remove('active');
            }else if(document.querySelector("#IM.active")){
                elementoIM.classList.remove('active');
            }
            elementoEQ.classList.add('active');
        }
    });
});

function ocultarElementos(parrafoCRM, parrafoERP, parrafoDW, parrafoMD,
    parrafoTL, parrafoEC, parrafoER, parrafoIC, parrafoIM, parrafoEQ){
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
}
