$().ready(function () {
    var chatToken;
    var chatId = $('#chat-id').val();

    // global socket object
    var socket;

    // getting chat token & launching socket

    // SYNCHRONOUS REQUESTS

    getChatToken(123, chatId);

    getChatMessages(chatId);

    if (chatToken) {
        // as soon as token received - we initiate socket opening
        socketInit();
    }

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
            switch (response.type) {
                case 'message':
                    $('#chat-messages').append(renderMsg(response.user_name, response.message, response.date, response.user_id));
                    break;
                case 'service':
                    $('#chat-messages').append(renderServiceMsg(response.message, response.date));
                    break;
            }
        };
    }

    function sendMessage(messageText) {
        socket.send(JSON.stringify({'action': 'msg', 'msg': messageText}));
    }

    function renderMsg(author, message, date, userId) {
        return ('<div class="chat-message"><div class="chat-message-header">' + date + ' | ' + author + ': </div><div class="chat-message-body">' + message + '</div></div>');
    }

    function renderServiceMsg(message, date) {
        return ('<div class="chat-message chat-message-service"><div class="chat-message-header">' + date + ' | ' + message + '</div></div>');
    }

    function getChatToken(token, chatId) {
        // getting required chat room token by user token
        $.ajax({
            url: '/chat/create-chat-session',
            data: {'token': token, 'chat_id': chatId},
            success: function (result) {
                chatToken = result.token;
            },
            async: false
        });
    }

    function getChatMessages(chatId) {
        // getting required chat messages
        $.ajax({
            url: '/chat/messages/' + chatId,
            success: function (result) {
                var html = '';
                result.forEach(function (item, i) {
                    html += renderMsg(item.user_name, item.text, item.datetime, item.user_id);
                });
                $('#chat-messages').append(html);
            },
            async: false
        });
    }

});