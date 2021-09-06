$(document).ready(function () {

    $.post('../../roles/control/ctrlNavBar.php', {}, function (responseText) {
        $('#navbar').html(responseText);
    });

});