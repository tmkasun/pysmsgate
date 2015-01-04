function closeAll() {
    $('.modal').modal('hide');
}

$(function () {

    $(".modal-content").draggable({
        handle: ".modal-header"
    });

//Clear modal content for reuse the wrapper by other functions
    $('body').on('hidden.bs.modal', '.modal', function () {
        $(this).removeData('bs.modal');
    });

});
