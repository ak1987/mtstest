<?php

use app\assets\ChatAsset;


ChatAsset::register($this);
?>
<div class="row">
    <div class="col-sm-12 col-md-10">
        <div id="chat-window">
            <div id="chat-messages"></div>
            <div id="chat-controls">
                <input type="hidden" id="chat-id" value="<?= $chatId ?>">
                <textarea id="chat-new-message" rows="10"></textarea>
                <button id="send-new-message" class="btn btn-primary">Send Message</button>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-2">
        <div id="user-list">
            <ul>
                <li>
                    <span class="label label-default" id="chat-user-2">
                        Вася
                    </span>
                </li>
            </ul>
        </div>
    </div>
</div>