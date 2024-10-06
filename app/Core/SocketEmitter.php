<?php

namespace Core;

class SocketEmitter
{
    private $socketServerUrl;

    public function __construct()
    {
        $config = require base_path('app/model/config.php');
        $this->socketServerUrl = $config['socket']['server_url'];
    }

    public function emit($event, $data)
    {
        $ch = curl_init();
        
        $payload = [
            'event' => $event,
            'data' => $data
        ];
        
        curl_setopt($ch, CURLOPT_URL, "{$this->socketServerUrl}/emit");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $response = curl_exec($ch);
        curl_close($ch);
        
        return $response;
    }
}