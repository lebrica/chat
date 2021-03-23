$('#message-form').on('submit', function (event) {
    event.preventDefault();
    var message = $('#message');
    var form = $(this);

    form.find('.error').remove();
        if (message.val() === '') {
            message.before('<div class="error">Введите сообщение </div>')
    } else {
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
    }
})

$('#message').keypress(function(e) {
    if(e.which === 13) {
        $(this).blur();
        $('.submit').focus().click();
    }
});

