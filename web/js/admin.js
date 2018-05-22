$().ready(function () {
    var chatToken = $('#token').val();

    socket = new WebSocket('ws://' + location.host + ':8080');

    socket.onopen = function (event) {
        socket.send(JSON.stringify({'action': 'adm-auth', 'chat_token': chatToken}));
        socket.send(JSON.stringify({'action': 'get-user-list'}));
    };

    socket.onmessage = function (e) {
        var response = JSON.parse(e.data);
        console.log(response);
        switch (response.type) {
            case 'user_list':
                break;
            case 'service':

                break;
            case 'termination':

                break;
        }
    };
});