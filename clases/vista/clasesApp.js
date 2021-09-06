$(document).ready(function () {


    $.post('ListarClasesServlet', {}, function (responseText) {
        $('#tablaDeClases').html(responseText);
    });

    $.post('SelectProgramasServlet', {}, function (responseText) {
        $('#selectPrograma').html(responseText);
    });

    //ingresar un programa
    $("#btn-ingresar-clase").click(function (e) {
        e.preventDefault();
        const selectProgramas = $('#selectProgramas').val();
        const grupo = $('#grupo').val();
        const fechaIni = $('#fechaIni').val();
        const fechaFin = $('#fechaFin').val();
        const cantClases = $('#cantClases').val();
        const selectEstado = $('#selectEstado').val();
        $.post('InsertarClasesServlet', {
            selectProgramas: selectProgramas,
            grupo: grupo,
            fechaIni: fechaIni,
            fechaFin: fechaFin,
            cantClases: cantClases,
            selectEstado: selectEstado
        }, function (responseText) {
            $('#respuesta').html(responseText);
        });
    });

    $(document).click(function (e) {
        const accion = e.target.id;
        //Boton de editar clase
        if (accion === "btn-editar-clase") {
            const id_clase = e.target.value;
            $.post('EditarClasesServlet', {
                id_clase: id_clase
            }, function (responseText) {
                $('#respuesta').html(responseText);
            });
        }
    });

    $(document).click(function (e) {
        const accion = e.target.id;
        if (accion === "btn-actualizar-clase") {
            const idClase = $('#idClase').val();
            const grupoClase = $('#grupoClase').val();
            const selectprogramaClase = $('#selectprogramaClase').val();
            const fechaInicio = $('#fechaInicio').val();
            const fechaFinal = $('#fechaFinal').val();
            const numeroClases = $('#numeroClases').val();
            const estadoClase = $('#estadoClase option:selected').val();
            $.post('ActualizarClasesServlet', {
                idClase: idClase,
                grupoClase: grupoClase,
                selectprogramaClase: selectprogramaClase,
                fechaInicio: fechaInicio,
                fechaFinal: fechaFinal,
                numeroClases: numeroClases,
                estadoClase: estadoClase
            }, function (responseText) {
                $('#respuesta').html(responseText);
            });
        }
    });



});

