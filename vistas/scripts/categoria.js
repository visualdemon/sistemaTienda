var tabla;

function init(){

}

//limpiar
function limpiar(){
    $("#idcategoria").val("");
    $("#nombre").val("");
    $("descripcion").val("");
}

//mostrar
function  mostrarfomr(flag){
    limpiar():
    if(flag){
        $("#listadoregistros").hide();
        $("#formularioregistros").show();
        $("#btnGuardar").prop("disabled",false);
    }
    else {
        $("#listadoregistros").show();
        $("#formularioregistros").hide();
    }
}

//funcion cancelar form
function cancelarform(){
    limpiar();
    mostrarfomr(false);
}

//petiocion listar
function listar (){
    tabla=$('$tbllistado').dataTable({
        "aProcessing": true,
        "aServSide": true,
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdf'
        ],
    "ajax":{
            url: '../ajax/categoria.php?op=listar',
            type: "get",
            dataType: "json",
            error: function (e){
                console.log(e.responseText);
            }
    }
    }).DataTable();
}

init();