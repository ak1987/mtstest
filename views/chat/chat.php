<?php

use app\assets\ChatAsset;


ChatAsset::register($this);
?>
<div class="row">
    <div class="col-sm-12 col-md-10">
        <div id="chat-window">
            <div id="chat-messages">
                <div class="chat-message">
                    <div class="chat-message-header">
                        2018-01-01 16:22:22 | Вася:
                    </div>
                    <div class="chat-message-body">
                        Привет
                    </div>
                </div>
                <div class="chat-message chat-message-service">
                    <div class="chat-message-header">
                        <span class="label label-danger">Вася is now offline</span>
                    </div>
                </div>
                <div class="chat-message">
                    <div class="chat-message-header">
                        2018-01-01 16:22:22 | Вася:
                    </div>
                    <div class="chat-message-body">
                        Привет
                    </div>
                </div>
                <div class="chat-message">
                    <div class="chat-message-header">
                        2018-01-01 16:22:22 | Вася:
                    </div>
                    <div class="chat-message-body">
                        Привет
                    </div>
                </div>
                <div class="chat-message chat-message-service">
                    <div class="chat-message-header">
                        <span class="label label-success">Вася is now online</span>
                    </div>
                </div>
                <div class="chat-message">
                    <div class="chat-message-header">
                        2018-01-01 16:22:22 | Вася:
                    </div>
                    <div class="chat-message-body">
                        Привет
                    </div>
                </div>
            </div>
            <div id="chat-controls">
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