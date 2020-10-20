$(document).ready(function () {
    var conn = new ab.connect('ws://localhost:8080',
        function (session)
        {
            console.log('connect')

            session.subscribe('chat1', function (topic, data) {
                console.log(data.message);
                notification(data.message);
            });
        },

        function (code, reason, detail)
        {
            console.warn('Ws conn closed: code=' + code+ '; reason=' + reason+ '; detail=' + detail)
        },

        {
            'maxRetries': 60,
            'retryDelay': 4000,
            'skipSubprotocolCheck': true
        }
    );
});

function notification(mess)
{
    $('.chat').append("<p>"+ mess +"</p>");
    $('#message').val('');
}


