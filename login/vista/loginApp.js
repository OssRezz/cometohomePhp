
$(document).ready(() => {
    //Login
    $("#btn-inciar-sesion").click(function () {
        const identificacion = $('#identificacion').val();
        const password = $('#password').val();
        $.post('../control/ctrlIniciarSesion.php', {
            identificacion: identificacion,
            password: password
        }, function (responseText) {
            $('#respuesta').html(responseText);
        });
    });
});

