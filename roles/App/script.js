$(document).ready(function () {

    const perfil = $('#perfilUsuario').val();
    $.post('../../roles/control/ctrlNavBar.php', {
        perfil: perfil
    }, function (responseText) {
        $('#navbar').html(responseText);
    });

});