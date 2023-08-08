<?php

// $serv = new Swoole\Server('127.0.0.1', 9702);

// //设置异步任务的工作进程数量。
// $serv->set([
//     'task_worker_num' => 4
// ]);

// //此回调函数在worker进程中执行。
// $serv->on('Receive', function($serv, $fd, $reactor_id, $data) {
//     //投递异步任务
//     $task_id = $serv->task($data);
//     echo "Dispatch AsyncTask: id={$task_id}\n";
// });

// //处理异步任务(此回调函数在task进程中执行)。
// $serv->on('Task', function ($serv, $task_id, $reactor_id, $data) {
//     echo "New AsyncTask[id={$task_id}]".PHP_EOL;
//     //返回任务执行的结果
//     $serv->finish("{$data} -> OK");
// });

// //处理异步任务的结果(此回调函数在worker进程中执行)。
// $serv->on('Finish', function ($serv, $task_id, $data) {
//     echo "AsyncTask[{$task_id}] Finish: {$data}".PHP_EOL;
// });

// $serv->start();

// $filesystemInfo = Swoole\Coroutine\System::statvfs(__FILE__);
// if (isset($filesystemInfo['extensions'])) {
//     $extensions = $filesystemInfo['extensions'];
//     echo "已加载的扩展列表：\n";
//     foreach ($extensions as $extension) {
//         echo $extension . "\n";
//     }
// } else {
//     echo "无法获取Swoole扩展的文件系统信息。\n";
// }


// //创建Server对象，监听 127.0.0.1:9501 端口。
// $server = new Swoole\Server('0.0.0.0', 9703);

// //监听连接进入事件。
// $server->on('Connect', function ($server, $fd) {
//     $_SERVER['fd'] = [$fd];
//     echo "Client: Connect.\n";
// });

// //监听数据接收事件。
// $server->on('Receive', function ($server, $fd, $reactor_id, $data) {
//     $server->send($fd, "Server: {$data}");
//     foreach ($_SERVER['fd'] as $item) {
//         if ($fd != $item) {
//             $server->send($item, "Server: {$data}");
//         }
//     }
    
// });

// //监听连接关闭事件。
// $server->on('Close', function ($server, $fd) {
//     echo "Client: Close.\n";
// });

// //启动服务器
// $server->start(); 




// $server = new Swoole\Server('127.0.0.1', 9703, SWOOLE_PROCESS, SWOOLE_SOCK_UDP);

// //监听数据接收事件。
// $server->on('Packet', function ($server, $data, $clientInfo) {
//     var_dump($clientInfo);
//     $server->sendto($clientInfo['address'], $clientInfo['port'], "Server：{$data}");
// });

// //启动服务器
// $server->start();



// $http = new Swoole\Http\Server('0.0.0.0', 9703);

// $http->on('Request', function ($request, $response) {
//     var_dump($request);
//     $response->header('Content-Type', 'text/html; charset=utf-8');
//     $response->end('<h1>Hello Swoole. #' . rand(1000, 9999) . '</h1>');
// });

// $http->start();



// //创建WebSocket Server对象，监听0.0.0.0:9502端口。
// $ws = new Swoole\WebSocket\Server('0.0.0.0', 9703);

// //监听WebSocket连接打开事件。
// $ws->on('Open', function ($ws, $request) {
//     $ws->push($request->fd, "hello, welcome\n");
// });

// //监听WebSocket消息事件。
// $ws->on('Message', function ($ws, $frame) {
//     echo "Message: {$frame->data}\n";
//     $ws->push($frame->fd, "server: {$frame->data}");
// });

// //监听WebSocket连接关闭事件。
// $ws->on('Close', function ($ws, $fd) {
//     echo "client-{$fd} is closed\n";
// });

// $ws->start();


// 运行http请求的长连
// $server = new Swoole\WebSocket\Server("0.0.0.0", 9703);
// $server->on('open', function (Swoole\WebSocket\Server $server, $request) {
//     echo "server: handshake success with fd{$request->fd}\n";
// });
// $server->on('message', function (Swoole\WebSocket\Server $server, $frame) {
//     echo "receive from {$frame->fd}:{$frame->data},opcode:{$frame->opcode},fin:{$frame->finish}\n";
//     $server->push($frame->fd, "this is server");
// });
// $server->on('close', function ($server, $fd) {
//     echo "client {$fd} closed\n";
// });
// // 192.168.238.133:9703?message=121212321aaaabb
// $server->on('request', function (Swoole\Http\Request $request, Swoole\Http\Response $response) {
//     global $server;//调用外部的server
//     // $server->connections 遍历所有websocket连接用户的fd，给所有用户推送
//     foreach ($server->connections as $fd) {
//         // 需要先判断是否是正确的websocket连接，否则有可能会push失败
//         if ($server->isEstablished($fd)) {
//             $server->push($fd, $request->get['message']);
//             $response->end('<h1>Hello Swoole. #' . rand(1000, 9999) . '</h1>');
//         }
//     }
// });
// $server->start();



use Swoole\Coroutine\Client;
use function Swoole\Coroutine\run;

run(function () {
    $client = new Client(SWOOLE_SOCK_TCP);
    if (!$client->connect('127.0.0.1', 9704))
    {
        echo "connect failed. Error: {$client->errCode}\n";
    }
    var_dump($client->isConnected());
    $data = [
        'type' => 3,
        'protocol_name' => 'MQTT',
        'topic' => 'simps-mqtt/user001/get',
        'qos' => 1,
        'message' => '你好啊'
    ];
    $client->send(json_encode($data));
    $a = $client->recv();
    var_dump($a);
    $client->close();
});

