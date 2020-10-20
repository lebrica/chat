$('form').on('submit', function (event) {
    event.preventDefault();
    let message = $('#message').val();

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/message',
        type: 'post',
        dataType: 'json',
        data: ({
            message: message,
           })
    })
})

$('#message').keypress(function(e) {
    if(e.which === 13) {
        $(this).blur();
        $('.submit').focus().click();
    }
});

