<script>
    socket = new WebSocket('ws://'+location.host+':8080');
    socket.onopen = function (e) {
        console.log(e);
    };
</script>