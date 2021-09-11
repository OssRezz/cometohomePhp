$(document).ready(function () {


    $(document).ready(function () {
        $("#btn-cambiar-correo").click(function () {
            const nuevoEmail = $('#nuevoEmail').val();
            const repetirEmail = $('#repetirEmail').val();
            const id = $('#id').val();
            $.post('../control/ctrlCambiarCorreo.php', {
                nuevoEmail: nuevoEmail,
                repetirEmail: repetirEmail,
                id: id
            }, function (responseText) {
                $('#respuesta').html(responseText);
            });
        });
    });

    $("#btn-cambiar-password").click(function () {
        // $(this).prop('disabled', true);

        $(this).hide();
        const spinner = document.querySelector('#spinner');
        spinner.style.display = 'flex';

        const nuevoPassword = $('#nuevoPassword').val();
        const repetirPassword = $('#repetirPassword').val();
        const codigo = $('#codigo').val();
        const correo = $('#correo').val();
        const nombre = $('#nombre').val();

        $.post('../control/ctrlCambiarPassword.php', {
            nuevoPassword: nuevoPassword,
            repetirPassword: repetirPassword,
            codigo: codigo,
            correo: correo,
            nombre: nombre
        }, function (responseText) {
            $('#respuesta').html(responseText);
            // $("#btn-cambiar-password").prop('disabled', false);

            $("#btn-cambiar-password").show();
            spinner.style.display = 'none';
        });
    });




});
