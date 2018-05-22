$().ready(function () {
    var chatToken = $('#token').val();

    socket = new WebSocket('ws://' + location.host + ':8080');

    socket.onopen = function (event) {
        socket.send(JSON.stringify({'action': 'adm-auth', 'chat_token': chatToken}));
        socket.send(JSON.stringify({'action': 'get-user-list'}));
    };

    socket.onmessage = function (e) {
        var response = JSON.parse(e.data);
        switch (response.type) {
            case 'user_list':
                var data = response.data;
                data.forEach(function (item, i) {
                    var chatId = item.chat_id;
                    item.user_list.forEach(function (user) {
                        var userId = user.id;
                        var name = user.name;
                        $('#user-list-' + chatId + '> .user-list').append('<li class="terminate-user" data-user_id="' + userId + '" data-chat_id="' + chatId + '" id="user-list-' + chatId + '-' + userId + '">' + name + '</li>');
                    })
                });
                break;
            case 'service':

                break;
        }
    };
    $('#chat-user-list').on('click', '.terminate-user', function () {
        var userId = $(this).data('user_id');
        var chatId = $(this).data('chat_id');
        console.log({'action': 'remove-user', 'user_id': userId, 'chat_id': chatId});
        socket.send(JSON.stringify({'action': 'remove-user', 'user_id': userId, 'chat_id': chatId}));
    })
});