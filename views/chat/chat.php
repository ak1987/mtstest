<?php

use app\assets\ChatAsset;


ChatAsset::register($this);
?>
<div class="row">
    <div class="col-sm-12">
        <div id="chat-window">
            <div id="chat-messages"></div>
            <div id="chat-controls">
                <input type="hidden" id="chat-id" value="<?= $chatId ?>">
                <input type="hidden" id="user-token" value="<?= $userToken ?>">
                <textarea id="chat-new-message" rows="10"></textarea>
                <button id="send-new-message" class="btn btn-primary">Send Message</button>
            </div>
        </div>
    </div>
</div>