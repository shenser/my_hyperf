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

use App\Middleware\Auth\FooMiddleware;
use App\Model\IotCattle;
use App\Model\IotMember;
use App\Model\IotXqClientSqytest;
use App\Model\Member;
use App\Resource\IotCattleCollection;
use App\Service\UserService;
use App\Task\AnnotationTask;
use App\Task\MethodTask;
use App\Task\MongoTask;
use App\Task\MongoTask1;
use App\Task\TestTaskService;
use Closure;
use Hyperf\Context\ApplicationContext;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\Coroutine\Coroutine;
use Hyperf\DbConnection\Db;
use Hyperf\HttpServer\Annotation\Middleware;
use Hyperf\Scout\Builder;
use Hyperf\Task\TaskExecutor;
use Hyperf\Task\Task;

#[AutoController]
class TestController extends AbstractController
{
    #[Inject]
    private UserService $userService;
    /**
     * @description: 主动投递
     * @return {*}
     */
    public function test1()
    {
        $res = $this->userService->getInfoById(1);
        var_dump($res);

        $container = ApplicationContext::getContainer();
        $exec = $container->get(TaskExecutor::class);
        $result = $exec->execute(new Task([MethodTask::class, 'handle'], [Coroutine::id()]));
        var_dump($result);

        return 1212;
    }

    /**
     * @description: 注解投递
     * @return {*}
     */
    public function test2()
    {
        $container = ApplicationContext::getContainer();
        echo 'mast:' . getmypid() . PHP_EOL;
        $task = $container->get(AnnotationTask::class);
        $task->handle(Coroutine::id());
        echo 'mast2:' . getmypid() . PHP_EOL;
        return 333;
    }

    /**
     * @description: mongoDb注解投递
     * @return {*}
     */
    public function test3()
    {
        $client = ApplicationContext::getContainer()->get(MongoTask1::class);
        var_dump($client);
        // $client->manager();
        // $client->insert('hyperf.test', ['id' => rand(0, 99999999)]);

        $result = $client->query('aiotagro.farm', [], [
            'limit' => 1,
        ]);

        var_dump($result);

        return 121211;
    }

    public function test3_1()
    {
        $client = ApplicationContext::getContainer()->get(MongoTask::class);
        var_dump($client);
        $client->client();
        // $client->manager();
        // $client->insert('hyperf.test', ['id' => rand(0, 99999999)]);

        $result = $client->select();

        var_dump($result);

        return 121211;
    }

    #[Inject]
   protected TestTaskService $testTaskService;

    public function test4()
    {
        $this->testTaskService->handle(Coroutine::id());
        echo date('Y-m-d H:i:s') .  ' index() 第一次输出结果' . PHP_EOL;
        $this->testTaskService->handle(Coroutine::id());
        echo date('Y-m-d H:i:s') .  ' index() 第二次输出结果' . PHP_EOL;
        return 111;
    }

    public function test5()
    {
        $uri = 'mongodb://root:aiotagro@192.168.0.104:27017/aiotagro';
        $a = new \MongoDB\Driver\Manager($uri, []);
        var_dump($a);
    }

    #[Middleware(FooMiddleware::class)]
    public function test6()
    {
        return 212;
    }

    public function test7()
    {
        // Db::table('iot_cattle')->sharedLock()->get();
        $list = Db::select('SELECT * FROM iot_cattle limit 5');
        var_dump($list);
        return  IotCattleCollection::collection(IotCattle::first())->toResponse();
        // return $list;
    }

    public function test8()
    {
        // $list = \App\Model\IotMember::where('realname', '=', '吴志昊')->searchable();
        // $list = IotMember::search('18888888888')->get();
        // $list = IotMember::search('18888888888')->raw();
        // $list = IotMember::search('')->where('id', 1)->get();
        // $list = IotMember::search('0')->paginate(2, 'page', 2);

        // $col = IotXqClientSqytest::where('id', '<', '80')->get();
        // $col->searchable();
        // $col = IotXqClientSqytest::where('id', '<', '81')->searchable();
        // $list = IotXqClientSqytest::search('81')->get();
        // var_dump($col);
        // $list = IotXqClientSqytest::search('99.622')->get();
        
        
        // $list = IotMember::search('123')->orderBy('uid', 'desc')->get();
        // 权重排序
        // $list = IotMember::search('甲骨文超级码')->where('username', '甲骨文超级码')->orderBy('uid', 'desc')->raw();
        // $list = IotMember::search('', function (\Elasticsearch\Client $client) {
        //     // $results = $Client->count();

        //     // 精准匹配
        //     // $params = [
        //     //     'index' => 'iot_member',
        //     //     'body' => [
        //     //         'query' => [
        //     //             'term' => [
        //     //                 'username.keyword' => '甲骨文超级码'
        //     //             ]
        //     //         ]
        //     //     ]
        //     // ];
            
        //     // 模糊匹配并排序
        //     // $params = [
        //     //     // 'index' => 'iot_member',
        //     //     'body' => [
        //     //         'query' => [
        //     //             'match_phrase' => [
        //     //                 'username' => '甲骨文超级码'
        //     //             ]
        //     //         ],
        //     //         'sort' => [
        //     //             [
        //     //                 'uid' => 'asc'
        //     //             ]
        //     //         ]
        //     //     ]
        //     // ];

        //     $params = [
        //         'index' => 'iot_xq_client_sqytest',
        //         'body' => [
        //             'query' => [
        //                 'match_phrase' => [
        //                     'sn' => '2105000088'
        //                 ]
        //             ]
        //         ]
        //     ];
        //     $response = $client->search($params);
        //     var_dump('response：', $response);

        //     // // 返回搜索结果
        //     return $response;
        // })->orderBy('uid', 'desc')->get();

        $from = 0;
        $size = 2;
        $list = IotXqClientSqytest::search('', function (\Elasticsearch\Client $client) use ($from , $size) {
            $params = [
                // 'index' => 'iot_xq_client_sqytest',
                'body' => [
                    'query' => [
                        'match_phrase' => [
                            'sn' => '2105000088'
                        ]
                    ],
                    'from' => $from,   // 起始索引
                    'size' => $size   // 每页大小
                ]
            ];
            $response = $client->search($params);
            var_dump('response：', $response);

            // // 返回搜索结果
            return $response;
        })->paginate(2, 'page', 2);
        
        var_dump($list);

        return $list;
    }

    public function test9()
    {
        $res = Member::query()->find(1);
        var_dump($res);
        return $res;
    }

    public function test10()
    {
        $res = Member::all();

        co(function() use ($res) {
            // go(function () use ($res) {//创建100个协程
                
            // });

            foreach ($res as $k => $item) {
                // Member::find($item['uid']);
                echo $k;
                // sleep(1);
                Coroutine::sleep(1);
            }
            
        });
        
        echo "=================" . PHP_EOL;
        var_dump(count($res));
        return 12;
    }
}
