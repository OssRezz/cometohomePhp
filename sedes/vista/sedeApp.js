$(document).ready(function () {


    //ingresar una sede
    $("#btn-ingresar-sede").click(function (e) {
        e.preventDefault();
        const sede = $('#sede').val();
        const direccion = $('#direccion').val();
        const telefono = $('#telefono').val();
        const aula = $('#aula').val();
        $.post('../control/ctrlInsertarSedes.php', {
            sede: sede,
            direccion: direccion,
            telefono: telefono,
            aula: aula
        }, function (responseText) {
            $('#respuesta').html(responseText);
        });
    });

    // //Responde con la modal de editar sedes
    // $(document).click(function (e) {
    //     const accion = e.target.id;
    //     if (accion === "editar") {
    //         const codigo = e.target.value;
    //         $.post('EditarSedesServlet', {
    //             codigo: codigo
    //         }, function (responseText) {
    //             $('#respuesta').html(responseText);
    //         });
    //     }
    // });

    // //Actualizar sede post
    // $(document).click((e) => {
    //     const accion = e.target.id;
    //     if (e.target.id === "btn-actualizar-sede") {
    //         const id_sede = $('#id_sede').val();
    //         const nombreSede = $('#nombreSede').val();
    //         const direccionSede = $('#direccionSede').val();
    //         const telefonoSede = $('#telefonoSede').val();
    //         const aulaSede = $('#aulaSede').val();
    //         $.post('ActualizarSedeServlet', {
    //             id_sede: id_sede,
    //             nombreSede: nombreSede,
    //             direccionSede: direccionSede,
    //             telefonoSede: telefonoSede,
    //             aulaSede: aulaSede
    //         }, (responseText) => {
    //             $('#respuesta').html(responseText);
    //         });
    //     }
    // });


    // //Responde con la modal de eliminar sede
    // $(document).click(function (e) {
    //     const accion = e.target.id;
    //     if (accion === "borrar") {
    //         const sede = e.target.value;
    //         $.post('ModalEliminarSedeServlet', {
    //             sede: sede
    //         }, function (responseText) {
    //             $('#respuesta').html(responseText);
    //         });
    //     }
    // });

    // //Elimina la sede
    // $(document).click(function (e) {
    //     const accion = e.target.id;
    //     if (accion === "eliminarUsuario") {
    //         const codigo = e.target.value;
    //         $.post('EliminarUsuarioServlet', {
    //             codigo: codigo
    //         }, function (responseText) {
    //             $('#respuesta').html(responseText);
    //         });
    //     }
    // });



});


