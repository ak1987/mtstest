<?php

use app\assets\AdminAsset;

AdminAsset::register($this);
?>
<input type="hidden" id="token" value="<?= $token ?>">
<div class="container">
    <div class="row">
        <div class="col-md-6" id="user-list-1">
            <h4>Chat1</h4>
            <div class="user-list"></div>
        </div>
        <div class="col-md-6" id="user-list-2">
            <h4>Chat2</h4>
            <div class="user-list"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6" id="user-list-3">
            <h4>Chat3</h4>
            <div class="user-list"></div>
        </div>
        <div class="col-md-6" id="user-list-4">
            <h4>Chat4</h4>
            <div class="user-list"></div>
        </div>
    </div>
</div>
