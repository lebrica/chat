$(document).ready(function () {
    var conn = new ab.connect('ws://localhost:8080',
        function (session)
        {
            console.log('connect')

            session.subscribe('chat', function (channel, data) {
                console.log(data.message);
                message(data.message, data.name);
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

function message(mess, name)
{
    $('.chat').append("<p>"+ name + ": " + mess +"</p>");
}


