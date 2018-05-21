$().ready(function () {
    var chatToken;
    var chatId = $('#chat-id').val();

    // global socket object
    var socket;

    // getting chat token & launching socket

    getChatToken(123, chatId);

    $('#send-new-message').on('click', function () {
        var message = $('#chat-new-message').val();
        sendMessage(message);
    });

    function socketInit() {
        socket = new WebSocket('ws://' + location.host + ':8080');

        socket.onopen = function (event) {
            console.log({'action': 'auth', 'chat_token': chatToken});
            socket.send(JSON.stringify({'action': 'auth', 'chat_token': chatToken}));
        };

        socket.onmessage = function (e) {
            var response = JSON.parse(e.data);
            $('#chat-messages').append(renderMsg(response.user_name, response.message, response.date, response.user_id));
        };
    }

    function sendMessage(messageText) {
        socket.send(JSON.stringify({'action': 'msg', 'msg': messageText}));
    }

    function renderMsg(author, message, date, userId) {
        var html;
        html = '<div class="chat-message"><div class="chat-message-header">' + date + ' | ' + author + ': </div><div class="chat-message-body">' + message + '</div></div>';
        return html;
    }

    function getChatToken(token, chatId) {
        var token = 123;
        // getting required chat room token by user token
        $.getJSON('/chat/create-chat-session', {'token': token, 'chat_id': chatId}, function (response) {
            chatToken = response.token;
            // as soon as token received - we initiate socket opening
            socketInit();
        });
    }

});