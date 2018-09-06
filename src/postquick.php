<?php
    namespace PostQuick;

    require_once './socket-io.php';

    class Client
    {
        private $socket;

        function __construct($token) {
           $this-socket = new SocketIO('postquick.startnet.co', 80);
           $this-socket->setQueryParams([
               'key' => $token,
               'ip' => file_get_contents('https://api.ipify.org/?format=json')['ip']
           ]);
        }

        public function emit($event, $data = array()) {
            return $this-socket->emit($event, $data);
        }
    }