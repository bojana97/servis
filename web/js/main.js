/*
$(function () {
    $('#modalButton').click(function () {
        $('#modal').modal('show')
            .find('#modalContent')
            .load($(this).attr('value'))
    });
});


$('#BtnModalId').click(function (e) {
    e.preventDefault();
    $('#my-modal').modal('show')
        .find('#modalContent')
        .load($(this).attr('value'));
    return false;
});
*/

$(function () {
    $('#modelButton').click(function () {
        $('.modal').modal('show')
            .find('#modelContent')
            .load($(this).attr('value'));
    });
});


