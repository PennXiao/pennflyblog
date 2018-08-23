<?php
/**
 * swool
 */
class webSocket
{
    public $serve;

    protected $host = '0.0.0.0';
    protected $port = '9501';
    protected $msg = [
        'contPeople' => 0,
        'message' => '',
    ];
    
    function __construct()
    {

        $this->serve = new swoole_websocket_server($this->host,$this->port);

        $this->serve->on('open',function(swoole_websocket_server $server, $frame){ 
            $this->msg['contPeople'] = count($server->connections);
            $response = json_encode($this->msg);
            foreach ($server->connections as $clientId) {
                $server->push($clientId,$response); 
            }
        });


        $this->serve->on('message', function (swoole_websocket_server $server, $frame) {

            $this->msg['message'] = $frame->data;
            $this->msg['contPeople'] = count($server->connections);
            $response = json_encode($this->msg);

            foreach ($server->connections as $clientId) {
                if ($clientId == $frame->fd) {
                    continue;
                }
                $server->push($clientId, $response);
            }

        });

        $this->serve->on('close', function (swoole_websocket_server $server, $fd) {


        });

        $this->serve->start();
    } 
}

new webSocket();