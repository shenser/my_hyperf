<?php
// 该类为 Task 处理类
   
namespace App\Task;

use Hyperf\Logger\LoggerFactory;
use Psr\Log\LoggerInterface;
use Hyperf\Coroutine\Coroutine;

class TestTaskService
{
   protected LoggerInterface $logger;

   public function __construct(LoggerFactory $loggerFactory)
   {
       $this->logger = $loggerFactory->get('log', 'default');
   }
   
   public function handle($cid)
   {
       echo $cid . '====' . Coroutine::id() . PHP_EOL;
       //sleep(2);
       Coroutine::sleep(2);
       
       echo date('Y-m-d H:i:s') .  ' Task handle() 输出结果' . PHP_EOL;
   }
}