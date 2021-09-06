$(document).ready(function () {

    //Carga la paginación de la vista de matriculas
    const limit = $("#limit").val();
    const pagina = $("#pagina").val();
    $.post('../control/ctrlPaginacion.php', {
        limit: limit,
        pagina: pagina

    }, function (responseText) {
        $('#paginacion').html(responseText);
    });

    // //ingresar un programa
    // $("#btn-ingresar-programa").click(function (e) {
    //     const selectescuela = $('#selectescuela').val();
    //     const nombre = $('#nombre').val();
    //     const edad = $('#edad').val();
    //     const selectsede = $('#selectsede').val();
    //     const cupos = $('#cupos').val();
    //     const costo = $('#costo').val();
    //     const fechainicio = $('#fechainicio').val();
    //     const fechafinal = $('#fechafinal').val();
    //     const horario = $('#horario').val();
    //     const selectestado = $('#selectestado').val();
    //     $.post('InsertarProgramasServlet', {
    //         selectescuela: selectescuela,
    //         nombre: nombre,
    //         edad: edad,
    //         selectsede: selectsede,
    //         cupos: cupos,
    //         costo: costo,
    //         fechainicio: fechainicio,
    //         fechafinal: fechafinal,
    //         horario: horario,
    //         selectestado: selectestado
    //     }, function (responseText) {
    //         $('#respuesta').html(responseText);
    //     });
    // });

    // //Post actualizar Editar
    // $(document).click(function (e) {

    //     const accion = e.target.id;

    //     //Boton de editar programa
    //     if (accion === "editar") {

    //         const programa = e.target.value; 
    //         $.post('EditarProgramaServlet', {
    //             programa: programa
    //         }, function (responseText) {
    //             $('#respuesta').html(responseText);
    //         });


    //     }
    // });

    // //Post actualizar programa
    // $(document).click(function (e) {

    //     const accion = e.target.id;
    //     if (accion === "btn-actualizar-programa") {

    //         const id_programa = $('#id_programa');
    //         const selectescuelaPrograma = $('#selectescuelaPrograma').val();
    //         const nombrePrograma = $('#nombrePrograma').val();
    //         const edadPrograma = $('#edadPrograma').val();
    //         const selectsedePrograma = $('#selectsedePrograma').val();
    //         const cuposPrograma = $('#cuposPrograma').val();
    //         const costoPrograma = $('#costoPrograma').val();
    //         const fechaIniPrograma = $('#fechaIniPrograma').val();
    //         const fechaFinPrograma = $('#fechaFinPrograma').val();
    //         const horarioPrograma = $('#horarioPrograma').val();
    //         const estadoPrograma = $('#estadoPrograma').val();
    //         alert(estadoPrograma);
    //         $.post('ActualizarProgramaServlet', {
    //             id_programa: id_programa,
    //             selectescuelaPrograma: selectescuelaPrograma,
    //             nombrePrograma: nombrePrograma,
    //             edadPrograma: edadPrograma,
    //             selectsedePrograma: selectsedePrograma,
    //             cuposPrograma: cuposPrograma,
    //             costoPrograma: costoPrograma,
    //             fechaIniPrograma: fechaIniPrograma,
    //             fechaFinPrograma: fechaFinPrograma,
    //             horarioPrograma: horarioPrograma,
    //             estadoPrograma: estadoPrograma
    //         }, function (responseText) {
    //             $('#respuesta').html(responseText);
    //         });
    //     }
    // });


});
