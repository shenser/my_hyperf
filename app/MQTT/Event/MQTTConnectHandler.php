<?php

declare(strict_types=1);

namespace App\MQTT\Event;

use Hyperf\HttpMessage\Server\Response;
use Hyperf\MqttServer\Annotation\MQTTConnect;
use Hyperf\MqttServer\Handler\HandlerInterface;
use Psr\Http\Message\ServerRequestInterface;

#[MQTTConnect(priority: 1)]
class MQTTConnectHandler implements HandlerInterface
{
    public function handle(ServerRequestInterface $request, Response $response): Response
    {
        echo 1212;
        var_dump((string) $request->getBody());
        return $response;
    }
}