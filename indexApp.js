
$(document).ready(() => {

    //tarjetas de musica
    $.post('programas/control/ctrlCardsMusica.php', {}, function (responseText) {
        $('#cardMusica').html(responseText);
    });

    //tarjetas de artes audiovisuales
    $.post('programas/control/ctrlCardsAudiovisuales.php', {}, function (responseText) {
        $('#cardAudiovisuales').html(responseText);
    });

    //tarjetas de artes escenicas
    $.post('programas/control/ctrlCardsEscenicas.php', {}, function (responseText) {
        $('#cardEscenicas').html(responseText);
    });


    //Login
    $("#btn-modal-login").click(function (e) {
        $.post('usuarios/control/ctrlModalLogin.php', {}, function (responseText) {
            $('#respuesta').html(responseText);
        });
    });


    //Login
    $(document).click(function (e) {
        $("#btn-inciar-sesion").click(function (e) {
            e.preventDefault();
            const identificacion = $('#identificacion').val();
            const password = $('#password').val();
            $.post('usuarios/control/ctrlIniciarSesion.php', {
                identificacion: identificacion,
                password: password
            }, function (responseText) {
                $('#respuesta').html(responseText);
            });
        });
    });

    $(document).click(function (e) {
        const accion = e.target.id;
        if (accion === "btn-inscribirse") {
            const programa = e.target.value;
            $.post('inscripcion/control/ctrlBtnInscribirse.php', {
                programa: programa
            }, function (responseText) {
                $('#respuesta').html(responseText);
            });
        }
    });

    $(document).click(function (e) {
        const accion = e.target.id;
        if (accion === "btn-inscripcion") {
            const programa = e.target.value;
            $.post('inscripcion/control/ctrlModalInscripcion.php', {
                programa: programa
            }, function (responseText) {
                $('#respuesta').html(responseText);
            });
        }
    });

    $(document).click(function (e) {
        const accion = e.target.id;
        if (accion === "btn-insertar-inscripcion") {
            const fecha = $('#fecha').val();
            const idPrograma = $('#idPrograma').val();
            const cedula = $('#cedula').val();
            $.post('inscripcion/control/ctrlInsertarInscripcion.php', {
                fecha: fecha,
                idPrograma: idPrograma,
                cedula: cedula
            }, function (responseText) {
                $('#respuesta').html(responseText);
            });
        }
    });


});

