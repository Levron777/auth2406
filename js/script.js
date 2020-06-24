$(document).ready(function() {

    $('.registerFadeIn').click(function() {
        $('#signinContainer').hide();
        $('#signupContainer').fadeIn();
        return false;
    });

    $('.editFadeIn').click(function() {
        $('.editInfo').hide();
        $('#editContainer').fadeIn();
        return false;
    });

});