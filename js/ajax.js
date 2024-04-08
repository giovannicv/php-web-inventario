const formularios_ajax=document.querySelectorAll(".FormularioAjax");

function enviar_formulario_ajax(e){
    e.preventDefault();
//enviar formulario
    let enviar=confirm("Quieres enviar el formulario");

    if(enviar==true){
        let data= new FormData(this);
        let method=this.getAttribute("method");
        let action=this.getAttribute("action");

        let encabezados= new Headers();

        let config={
            method: method,
            headers: encabezados,
            mode: 'cors',
            cache: 'no-cache',
            body: data
        };
//manda los datos para que se guarden via AJAX
        fetch(action,config)
        .then(respuesta => respuesta.text())
        .then(respuesta =>{
            let contenedor=document.querySelector(".from-rest");
            contenedor.innerHTML = respuesta;
        });
    }
}
//formulario para enviar
formularios_ajax.forEach(formularios => {
    formularios.addEventListener("submit",enviar_formulario_ajax);
});