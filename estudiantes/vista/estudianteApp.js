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

    //Modal Para salir de la sesión ctrlModalOut
    $("#btn-logOut").click(function (e) {
        $.post('../../login/control/ctrlModalOut.php', {}, function (responseText) {
            $('#respuesta').html(responseText);
        });
    });
    //Cerrar la sesion, volver al index. ctrlSesiónDestroy
    $(document).click(function (e) {
        if (e.target.id === "btn-sesionOut") {
            $.post('../../login/control/ctrlSesionDestroy.php', {}, function (responseText) {
                $('#respuesta').html(responseText);
            });
        }
    });


    //tarjetas de la vista alumno clase
    const idenEstudiante = $('#idenEstudiante').val();
    $.post('../control/ctrlCardsClaseEstudiante.php', {
        idenEstudiante: idenEstudiante
    }, function (responseText) {
        $('#claseEstudiante').html(responseText);
    });

    $("#btn-ingresar-estudiante").click(function (e) {
        $(this).hide();
        const spinner = document.querySelector('#spinner');
        spinner.style.display = 'flex';

        const identificacion = $('#identificacion').val();
        const nombre = $('#nombre').val();
        const apellido = $('#apellido').val();
        const nacimiento = $('#nacimiento').val();
        const sisben = $('#sisben').val();
        const email = $('#email').val();
        const telefono = $('#telefono').val();
        const direccion = $('#direccion').val();
        const selectGenero = $('#selectGenero').val();
        const selectPoblacion = $('#selectPoblacion').val();
        const password = $('#password').val();
        const passwordVerify = $('#passwordVerify').val();
        $.post('../control/ctrlIngresarEstudiantes.php', {
            identificacion: identificacion,
            nombre: nombre,
            apellido: apellido,
            nacimiento: nacimiento,
            sisben: sisben,
            email: email,
            telefono: telefono,
            direccion: direccion,
            selectGenero: selectGenero,
            selectPoblacion: selectPoblacion,
            password: password,
            passwordVerify: passwordVerify
        }, function (responseText) {
            $('#respuesta').html(responseText);
            $("#btn-ingresar-estudiante").show();
            spinner.style.display = 'none';
        });
    });

    $(document).click((e) => {
        let cc_estudiante;

        if (e.target.id === "btn-editar-estudiante") {

            cc_estudiante = e.target.value;
            $.post('../control/ctrlModalEditarEstudiante.php', {
                cc_estudiante: cc_estudiante
            }, function (responseText) {
                $('#respuesta').html(responseText);
            });

        } else if (e.target.id === "btn-actualizar-estudiante") {

            cc_estudiante = $('#cc_estudiante').val();
            const identificacion = $('#identificacion').val();
            const nombre = $('#nombre').val();
            const email = $('#email').val();
            const direccion = $('#direccion').val();
            const telefono = $('#telefono').val();
            const sisben = $('#sisben').val();
            const fecha = $('#fecha').val();
            const selectpoblacion = $('#selectpoblacion').val();
            const selectgenero = $('#selectgenero').val();

            $.post('../control/ctrlActualizarEstudiante.php', {
                cc_estudiante: cc_estudiante,
                identificacion: identificacion,
                nombre: nombre,
                email: email,
                direccion: direccion,
                telefono: telefono,
                sisben: sisben,
                fecha: fecha,
                selectpoblacion: selectpoblacion,
                selectgenero: selectgenero
            }, (responseText) => {
                $('#respuesta').html(responseText);
            });

        } else if (e.target.id === "btn-buscar-estudiante") {

            cc_estudiante = $('#inputSearch').val();
            $.post('../control/ctrlBuscarEstudiante.php', {
                cc_estudiante: cc_estudiante
            }, function (responseText) {
                $('#respuesta').html(responseText);
            });

        }

    });



});
