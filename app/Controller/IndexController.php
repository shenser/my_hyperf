<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace App\Controller;

use Hyperf\Context\ApplicationContext;
use App\Task\MongoTask;

class IndexController extends AbstractController
{
    public function index()
    {
        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();

        // echo __FILE__;
        // return phpinfo();

        // $client = ApplicationContext::getContainer()->get(MongoTask::class);
        // // // $client->insert('hyperf.test', ['id' => rand(0, 99999999)]);

        // $filter = ['name' => '玉山•吐合提'];
        // $result = $client->select('farm', $filter, [
        //     'limit' => 5,
        // ]);

        // $container = ApplicationContext::getContainer();

        // $redis = $container->get(\Hyperf\Redis\Redis::class);
        // $result = $redis->keys('*');
        
        // var_dump($result);

        return [
            'method' => $method,
            'message' => "Hello {$user}.~~中文",
        ];
    }

    public function test1()
    {
        return 1212;
    }
}
